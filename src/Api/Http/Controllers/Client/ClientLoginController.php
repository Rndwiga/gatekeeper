<?php

namespace Rndwiga\Authentication\Api\Http\Controllers\Client;

use Illuminate\Http\Request;
use Rndwiga\Authentication\Api\Http\Controllers\ApiController;
use Rndwiga\Authentication\Api\Http\Requests\Client\LoginClientFormRequest;
use Rndwiga\Authentication\Api\Http\Requests\Client\LoginMobileClientRequest;
use Rndwiga\Authentication\Infrastructure\Service\AuthorizationServiceClass;

class ClientLoginController extends ApiController
{
    protected $person, $client;
    private $authorizationServiceClass;

    public function __construct(AuthorizationServiceClass $authorizationServiceClass)
    {
        $this->authorizationServiceClass = $authorizationServiceClass;
    }

    public function authenticateClient(LoginClientFormRequest $request){

        return $this->authorizationServiceClass->loginClientUsingMode($request->all(),'email');
    }

    public function authenticateUsingMobilePin(LoginMobileClientRequest $request){
        return $this->authorizationServiceClass->loginClientUsingMode($request->all(),'mobile');
    }

    public function clientPasswordResetRequest(Request $request){
        //  return Client::getClientByMobileNumber($request->input('mobileNumber'));
        return $this->authorizationServiceClass->resetClientPasswordRequest($request->all());

        //send the notification

    }
    public function clientPasswordReset(Request $request){
        if($request->input('requestTypeEmail')){
            $client_request = ClientPasswordReset::all()->where('email',$request->input('email'))->first();
            if (count($client_request) > 0){
                $old_time = new \DateTime($client_request->created_at);
                $now = new  \DateTime("Y-m-d H:i:s");
                $time_difference = $now->getTimestamp() - $old_time->getTimestamp();
                if ($time_difference < 120){
                    return true;
                }else{
                    return false;
                }
            }
        }elseif ($request->input('requestTypeMobile')){
            $client_request = ClientPasswordReset::all()->where('mobile_number',$request->input('clientMobileNumber'))->first();
        }
        return false;
    }
    public function tester(Request $request){
        return 'I am tested';
    }

}
