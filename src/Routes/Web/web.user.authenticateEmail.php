<?php

Route::any('auth/email-authenticate/{token}',[
    'as' => 'auth.email.authentication',
    'uses' => 'Auth\LoginController@authenticateEmail'
]);