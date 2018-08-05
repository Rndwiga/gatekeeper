<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 1/7/18
 * Time: 4:48 PM
 */

namespace Rndwiga\Authentication\Infrastructure\Service;


use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Hash;
use Rndwiga\Authentication\Api\Http\Resources\ClientLoginResource;
use Rndwiga\Authentication\Infrastructure\Repository\ClientRepository;
use Rndwiga\Authentication\Models\Client\Client;


class AuthorizationServiceClass
{
    private $broadCastEvent;
    private $currentClient;
    private $clintDatabaseRepository;
    public function __construct(Dispatcher $dispatcher,ClientRepository $clientRepository)
    {
        $this->broadCastEvent = $dispatcher;
        $this->clintDatabaseRepository = $clientRepository;
        ClientLoginResource::withoutWrapping();
    }

    public function loginClientUsingMode($request = [], $authMode){
        $this->setCurrentClient($request,$authMode); //setting the currently accessed client
        if (! $this->currentClient){
            return response()->json([
                'status' => 'fail',
                'message' => 'Object does not exist',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'User does not exist',
                    'developerMessage' => 'Unable to retrieve the user from db',
                    'moreInfo' => ''
                ],
            ],404);
        }
        //testing block

        if ($this->validatePassword($request['password'])){
            $client = $this->clintDatabaseRepository->login($this->currentClient);
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged in',
                'data' => new ClientLoginResource($client),
                'error' => (object)[],
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Bad credentials provided',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'User does not exist',
                    'developerMessage' => 'The user with credentials provided does not exist',
                    'moreInfo' => ''
                ],
            ], 200);
        }
    }

    private function setCurrentClient($requestArray = [], $authMode){
        if ($authMode == 'email'){
            $this->currentClient = Client::getClientByUid($requestArray['email']);
        }
        if ($authMode == 'mobile'){
            $this->currentClient = Client::getClientByMobileNumber($requestArray['mobileNumber']);
        }
    }

    private function validatePassword($requestPassword){
        return Hash::check($requestPassword,$this->currentClient->password);
    }

    public function resetClientPasswordRequest($request = []){
        $random_string = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",6)),0,6);

        if ($request['mobileNumber']){
            $this->setCurrentClient($request,'mobile');
        }elseif ($request['email']){
            $this->setCurrentClient($request,'email');
        }
        if (! $this->currentClient){
            return response()->json([
                'status' => 'fail',
                'message' => 'Object does not exist',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'User does not exist',
                    'developerMessage' => 'Unable to retrieve the user from db',
                    'moreInfo' => ''
                ],
            ],404);
        }
        //dispatch email
       return $this->clintDatabaseRepository->setResetPasswordRequest($random_string,$this->currentClient);
    }
}