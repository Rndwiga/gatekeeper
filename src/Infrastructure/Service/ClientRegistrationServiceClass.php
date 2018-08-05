<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 2/4/18
 * Time: 11:34 AM
 */

namespace Rndwiga\Authentication\Infrastructure\Service;


use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Rndwiga\Authentication\Helpers\CbsHelper;
use Rndwiga\Authentication\Models\Client\Client;
use Rndwiga\Authentication\Models\Client\ClientOnboarding;
use Rndwiga\Mifos\Helpers\MifosUtility;
use Tyondo\Cirembo\Modules\Client\Providers\ModuleServiceProvider;
use Tyondo\Cirembo\Modules\Permission\Api\Resources\ClientResource;
use Tyondo\Cirembo\Modules\Permission\Helpers\SmsTemplateFormatter;
use Tyondo\Cirembo\Modules\Permission\ModuleHelper;
use Tyondo\Sms\Libraries\Infobip\SendSms;
use Tyondo\Sms\Libraries\TwilioAuthy\AuthyTwilio2FA;

class ClientRegistrationServiceClass
{
    protected  $settingSource;
    protected $payload;
    protected static $prospect;
    protected static $verificationMethod;

    public function __construct($request)
    {
        $this->getSettingSource();
        $this->validateRequestType($request);
        //$this->startClientOnboarding();
    }

    private function validateRequestType($request){

        if ($request->isJson()){
            if (empty($request->json()->all())){
                throw new \Exception('Invalid JSON payload');
            }else{
                $this->payload = $request->json()->all() ;
            }
        }else{
            $this->payload = $request->all();
        }
    }

    public function getSettingSource(){
        $source = env('APP_SETTINGS_SOURCE') ? env('APP_SETTINGS_SOURCE') : 'env';
        $this->settingSource = $source;
    }

    private function getVerificationMethod(){
        //TODO:: build this class to be able to pick these values from db.
        //self::$verificationMethod = getenv('CIREMBO_AUTH_PROVIDER');
        self::$verificationMethod = $this->get2faProvider();
    }
    private  function get2faProvider(){
        $authProvider2Fa = env('AUTHENTICATION_SMS_PROVIDER')?env('AUTHENTICATION_SMS_PROVIDER') : false;

        if ($authProvider2Fa === false){
            throw new \Exception('SMS Auth provider not set');

        }
        return $authProvider2Fa;
    }

    private function getTwilioApiKey(){
        $twilioApiKey =  env('APP_TWILIO_API_KEY');

        if ($twilioApiKey === false){
            throw new \Exception('Twilio api key not set');

        }
        return $twilioApiKey;
    }
    private function getWelcomeSms(){
        return env('SMS_AUTHENTICATION_SUCCESS_MESSAGE')? env('SMS_AUTHENTICATION_SUCCESS_MESSAGE') : "Welcome to: " . env('APP_NAME') ;
    }

    public function startClientOnboarding(){

        self::getVerificationMethod(); //getting the verification method

        self::$prospect = new ClientOnboarding([
            'country_code' => $this->payload['countryCode'],
            'phone_number' => $this->payload['mobileNumber'],
        ]);

        $externalCheck = (new CbsHelper())->doesClientExistInMifos($this->payload['mobileNumber']);
       // $externalCheck = true;

        if ($externalCheck == true){
            if (self::$verificationMethod == 'twilio'){
                return $this->startTwilioPhoneVerificationRequest();
            }elseif (self::$verificationMethod == 'infobip'){
                return $this->startInfobipPhoneVerificationRequest();
            }
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'You are not currently registered for this service.',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'Unable to compute response',
                    'developerMessage' => '',
                    'moreInfo' => ''
                ],
            ]);
        }
    }


    public function completeClientOnboarding(){
        self::getVerificationMethod();

        if (self::$verificationMethod == 'twilio'){
           return $this->completeTwilioPhoneVerificationCodeConfirm();
        }elseif (self::$verificationMethod == 'infobip'){
            return $this->completeInfobipPhoneVerificationCodeConfirm();
        }
        return false;
    }

    /**
     * {
    "error_code": "60060",
    "message": "Your account is suspended.",
    "errors": {
    "message": "Your account is suspended."
    },
    "success": false
    }
     * @return \Illuminate\Http\JsonResponse
     */

    private function startTwilioPhoneVerificationRequest(){

        self::$prospect->authy_status = 'unverified';
        $authy_api = new AuthyTwilio2FA(self::getTwilioApiKey());
        $response =  $authy_api->startVerification($this->payload);


        if (is_array($response)){
            if ($response['success'] == true){
                self::$prospect->carrier = $response['carrier'];
                self::$prospect->is_cellphone = isset($response['is_cellphone']) == true ? 1 : 0;
                self::$prospect->is_ported = isset($response['is_ported']) == true ? 1 : 0;
                self::$prospect->message = $response['message'];
                self::$prospect->seconds_to_expire = $response['seconds_to_expire'];
                self::$prospect->uuid = $response['uuid'];
                self::$prospect->request_success = isset($response['success']) == true ? 1 : 0;
                self::$prospect->save();

                return response()->json([
                    'status' => 'success',
                    'message' => self::$prospect->message,
                    'authyStatus' => self::$prospect->authy_status,
                    'mobileNumber' => self::$prospect->phone_number,
                    'secondsToExpire' => self::$prospect->seconds_to_expire
                ]);
                // {"country_code":"254","phone_number":"0712550547","authy_status":"unverified","carrier":"Safaricom (GSM)","is_cellphone":1,"is_ported":0,"message":"Text message sent to +254 71-255-0547.","seconds_to_expire":251,"uuid":"c239e3e0-b4e8-0135-f479-124ee06f05fc","success":true}

            }else{
                //TODO;; raise an exception and report to admin
                return response()->json([
                    'status' => 'fail',
                    'message' => 'invalid response from the server',
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => 'Unable to compute response',
                        'developerMessage' => $response,
                        'moreInfo' => ''
                    ],
                ]);
            }
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Server Error',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'Unable to compute response',
                    'developerMessage' => $response,
                    'moreInfo' => ''
                ],
            ]);
        }
    }
    private function completeTwilioPhoneVerificationCodeConfirm(){
        $authy_api = new AuthyTwilio2FA(self::getTwilioApiKey());
        $response = $authy_api->confirmVerificationCode($this->payload);

        //return $response;
        if ($response['success'] == true){
            //if the number is verified. set it so.
            //store the encryption keys to db
             //   $dataEncryption = new DataEncryption();
           // $keys =$dataEncryption::generateCrypticRsaPublicPrivate();

            return response()->json([
                'status' => 'success',
                'isClient' => $this->isClient($this->payload),
                'message' => 'verification code is correct',
               // 'certificate' => $keys['publicKey']
                'certificate' => ''
            ]);
        }else{
            return response()->json([
                'status' => 'fail',
                    'message' => 'verification code is incorrect',
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => 'invalid response from the server',
                        'developerMessage' => $response,
                        'moreInfo' => ''
                    ],
            ]);
        }
    }
    private function startInfobipPhoneVerificationRequest(){
        /*
         * {
              "pinId": "9C817C6F8AF3D48F9FE553282AFA2B67",
              "to": "41793026727",
              "ncStatus": "NC_DESTINATION_REACHABLE",
              "smsStatus": "MESSAGE_SENT"
            }
         */
        self::$prospect->authy_status = 'unverified';
        $smsClass = new SendSms();
        $result =  $smsClass->request2FaSms($this->payload['mobileNumber']);
        $response = json_decode($result, true);

        if (isset($response['requestError'])){
            return $response;
        }

        if (is_array($response)){

            if ($response['smsStatus'] == true){
                //self::$prospect->carrier = $response['carrier'];
                self::$prospect->infobip_pid = $response['pinId'];
                self::$prospect->infobip_nc_status = $response['ncStatus'];
                self::$prospect->message = "Text message sent to +{$response['to']}.";
                self::$prospect->seconds_to_expire = 599; //3 minutes
                self::$prospect->request_success = isset($response['smsStatus']) == 'MESSAGE_SENT' ? 1 : 0;

                self::$prospect->save();

                return response()->json([
                    'status' => 'success',
                    'message' => self::$prospect->message,
                    'authyStatus' => self::$prospect->authy_status,
                    'mobileNumber' => self::$prospect->phone_number,
                    'secondsToExpire' => self::$prospect->seconds_to_expire
                ]);
            }else{
                //TODO::raise an exception and report to admin
                return response()->json([
                    'status' => 'fail',
                    'message' => 'invalid response from the server',
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => 'invalid response from the server',
                        'developerMessage' => $response,
                        'moreInfo' => ''
                    ],
                ]);
            }

        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Unable to request for mobile number verification',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'There might be network issues while connecting to the OTP provider',
                    'developerMessage' => $response,
                    'moreInfo' => ''
                ],
            ]);
        }
    }

    private function completeInfobipPhoneVerificationCodeConfirm(){
        $verficationId = ClientOnboarding::getClientInfobipOtpIdByMobileNumber($this->payload['mobileNumber']);

        if (!$verficationId){
            return response()->json([
                'status' => 'fail',
                'message' => 'The OTP provided has expired. Request for another one',
                'data' => (object)[],
                'error' => [
                    'code' => 102,
                    'userMessage' => 'The OTP provided expired',
                    'developerMessage' => $verficationId,
                    'moreInfo' => ''
                ],
            ]);
        }

        $smsClass = (new SendSms())->verify2FASmsCode($verficationId['infobip_pid'],$this->payload['verificationCode']);
        /*
         * {
                "pinId": "4C0EFD6BB227DEA4DD078EE89E4F5C0E",
                "msisdn": "254712550547",
                "verified": true,
                "attemptsRemaining": 0
            }
        {
         "requestError": {
                "serviceException": {
                    "messageId": "PIN_ALREADY_VERIFIED",
                    "text": "Pin code is already verified."
                }
            }
        }
         */
       // return $verficationId['infobip_pid'];

        $response = json_decode($smsClass, true);
        if (isset($response['requestError'])){
            if ($response['requestError']){
                return response()->json([
                    'status' => 'fail',
                    'message' => $response['requestError']['serviceException']['text'],
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => $response['requestError']['serviceException']['text'],
                        'developerMessage' => $response,
                        'moreInfo' => ''
                    ],
                ]);
            }
        }else{
            //return $response;
            if ($response['verified'] == true){

                //if the number is verified. set it so.
                //store the encryption keys to db
               // $dataEncryption = new DataEncryption();
                //$keys =$dataEncryption::generateCrypticRsaPublicPrivate();

                return response()->json([
                    'status' => 'success',
                    'isClient' => $this->isClient($this->payload),
                    'message' => 'verification code is correct',
                    'certificate' => ''
                   // 'certificate' => $keys['publicKey']
                ]);
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'verification code is incorrect',
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => 'Incorrect Verification code provided',
                        'developerMessage' => $response,
                        'moreInfo' => ''
                    ],

                ]);
            }
        }
        /*
         * {
                "id": 13,
                "country_code": "254",
                "phone_number": "0712550547",
                "authy_status": "unverified",
                "authy_id": null,
                "is_ported": null,
                "is_cellphone": null,
                "carrier": null,
                "message": "Text message sent to +254712550547.",
                "uuid": null,
                "request_success": 1,
                "seconds_to_expire": 599,
                "infobip_pid": "98C6BCCEF592D3EC8BA0BC1BD0B34424",
                "infobip_nc_status": "NC_DESTINATION_REACHABLE",
                "created_at": "2018-02-04 15:03:33",
                "updated_at": "2018-02-04 15:03:33"
            }
         */
    }

    private function isClient(array $data = []){
        $isClient =  Client::getClientForOtp($data['mobileNumber']);
        if (is_null($isClient)){
            return false;
        }else{
            return true;
        }
    }

    public function storeClientRegistration(){
        //write logic for validation
        //$client = new Client($request->all());

        $isCustomeClassEnabled = env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_API')? env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_API'): false;

        if ($isCustomeClassEnabled !== false && isset($isCustomeClassEnabled)){
            $data = (new \Rndwiga\Mifos\src\Modules\Search\ClientSearch())->searchClientIdentifier(true,$this->payload['mobileNumber']);

            $externalId = $data[0]['parentId'];

            MifosUtility::logInfo($data,'client_reg_before','clientRegistration');

            MifosUtility::logInfo($data[0]['parentId'],'client_reg_parent_id','clientRegistration');
            MifosUtility::logInfo($data[0],'client_reg_parent_','clientRegistration');

        }

        
        $client = new Client([
            'username' => ' ',
            'externalId' => isset($externalId) ? $externalId : null,
            'client_uid' => Uuid::uuid4(),
            'created_at' => Carbon::now(),
           // 'system_agent' => 122,
            'accountNo' => time(),
            'mobileNo' => $this->payload['mobileNumber'],
            'email' => $this->payload['email'],
            'password' => Hash::make($this->payload['password']) ,
            //'status'   => $client === 0 ? true : rand(0, 1),
            'clientStatus'   => 200,
        ]);
        $client->save();
        //TODO:: raise client registration event
        $notice = new SendSms();
        //$message = SmsTemplateFormatter::formatSmsFromTemplate(self::getWelcomeSms(),null,null);
        $notice->sendSingleTextSms($this->payload['mobileNumber'],self::getWelcomeSms());
        // send sms notice
       
       // return new ClientResource($client);
        return response()->json([
            'status' => 'success',
            'id'            => (int) $client->id,
            'externalId' => $client->id,
            'email'     => (string) $client->email,
            'username'         => (string) $client->username,
            'clientUid'     => (string) $client->client_uid,
            'firstName'     => (string) $client->first_name,
            'lastName'     => (string) $client->last_name,
            'clientStatus'         => (string) $client->client_status,
            'systemAgent'         => (string) $client->system_agent,
            'mobileNumber'         => (string) $client->phone_number,
            'createdAt'     => (string) $client->created_at,
            'updatedAt'     => (string) $client->updated_at,
        ]);
    }
}