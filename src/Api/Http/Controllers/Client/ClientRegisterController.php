<?php

namespace Rndwiga\Authentication\Api\Http\Controllers\Client;

use Illuminate\Http\Request;
use Rndwiga\Authentication\Api\Http\Controllers\ApiController;
use Rndwiga\Authentication\Api\Http\Requests\Client\RegisterClientFormRequest;
use Rndwiga\Authentication\Api\Http\Requests\Client\VerificationMobileNumberCodeRequest;
use Rndwiga\Authentication\Api\Http\Requests\Client\VerificationMobileNumberRequest;
use Rndwiga\Authentication\Infrastructure\Service\ClientRegistrationServiceClass;

class ClientRegisterController extends ApiController
{
    protected $person;
    protected $payload;
    protected $registrationServiceClass;

    public function __construct(Request $request)
    {
        $this->registrationServiceClass = new ClientRegistrationServiceClass($request);
    }

    public function requestPhoneNumberVerification(VerificationMobileNumberRequest $request){
        return $this->registrationServiceClass->startClientOnboarding();
    }
    public function verifyPhoneNumberCode(VerificationMobileNumberCodeRequest $request)
    {
        return $this->registrationServiceClass->completeClientOnboarding();
    }

    public function clientRegistration(RegisterClientFormRequest $request){
        return $this->registrationServiceClass->storeClientRegistration();
    }

}
