<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('authentication.')->group(function () {

    Route::prefix('authentication')->group(function () {

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login')->name('login.post');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register')->name('register.post');

        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

        Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
        Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm.post');

        Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
        Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

        Route::any('email-authenticate/{token}',[
            'as' => 'auth.email.authentication',
            'uses' => 'Auth\LoginController@authenticateEmail'
        ]);
    });

});

