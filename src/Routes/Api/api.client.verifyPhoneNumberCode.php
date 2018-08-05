<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1/authentication')->group(function (){
    Route::post('/clients/verifyNumber/code', 'Client\ClientRegisterController@verifyPhoneNumberCode');
});




