<?php

namespace Rndwiga\Authentication\Models\Client;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Authy\AuthyApi;
use Tyondo\Cirembo\Modules\Authorization\Traits\AuthyTwilio2FA;

class Client extends Authenticatable
{

    use Notifiable;

    //protected $connection = 'tenant';

    protected $guarded = ['id'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = env('MODULE_PERMISSION_TENANCY_DB_CONNECTION') ? env('MODULE_PERMISSION_TENANCY_DB_CONNECTION'): '';
    }

    public static function getClientByMobileNumber($mobileNumber){
        return self::where('mobileNo',$mobileNumber)
            ->first();
    }

    public static function getClientForOtp($mobileNumber){
        return self::where('mobileNo',$mobileNumber)->first();
    }

    public static function getClientByUid($clientUid){
        return self::where('client_uid',$clientUid)->get();
    }

    public static function getClientByEmail($emailId){
        return self::where('email', $emailId)->first();
    }



    /**
     * Users can have many loans.
     *
     * @return object
     */
    public function loans()
    {
        return $this->hasMany('\Tyondo\Cirembo\Models\Loans');
    }
    /**
     * Users can have many loans.
     *
     * @return object
     */
    public function profile()
    {
        return $this->hasOne('\Tyondo\Cirembo\Modules\Client\Models\ClientProfile');
    }

    public function mobileData(){
        return  $this->hasMany('\Tyondo\Cirembo\Modules\Client\Models\ClientData','client_id','id');
    }

/*    public function register_authy() {
        $authy_api = new AuthyApi(getenv('AUTHY_API_KEY'));
        $user = $authy_api->registerUser($this->email, $this->phone_number, $this->country_code); //email, cellphone, country_code
        if($user->ok()) {
            $this->authy_id = $user->id();
            $this->save();
            return true;
        } else {
            // something went wrong
            return false;
        }
    }
    public function sendOneTouch($message) {
        // reset oneTouch status
        if($this->authy_status != 'unverified') {
            $this->authy_status = 'unverified';
            $this->save();
        }
        $params = array(
            'api_key'=>getenv('AUTHY_API_KEY'),
            'message'=>$message,
            'details[Email]'=>$this->email,
        );
        $defaults = array(
            CURLOPT_URL => "https://api.authy.com/onetouch/json/users/$this->authy_id/approval_requests",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
        );
        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $output = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($output);
        return $json;
    }
    public function sendToken() {
        $authy_api = new AuthyApi(getenv('AUTHY_API_KEY'));
        $sms = $authy_api->requestSms($this->authy_id);
        return $sms->ok();
    }
    public function verifyToken($token) {
        $authy_api = new AuthyApi(getenv('AUTHY_API_KEY'));
        $verification = $authy_api->verifyToken($this->authy_id, $token);
        if($verification->ok()) {
            return true;
        } else {
            return false;
        }
    }*/

}
