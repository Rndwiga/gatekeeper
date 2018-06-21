<?php

Route::any('auth/email-authenticate/{token}',[
    'as' => 'auth.email.authentication',
    'uses' => 'Auth\LoginController@authenticateEmail'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::patch('/admin/users/changePassword/{user}', 'UserController@changePassword');
Route::resource('admin/users', 'UserController');