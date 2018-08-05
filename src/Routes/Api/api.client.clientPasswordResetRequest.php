<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1/authentication')->group(function (){
    Route::post('/clients/password/reset/request', 'Client\ClientLoginController@clientPasswordResetRequest');
});




