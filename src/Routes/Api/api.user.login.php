<?php

Route::prefix('v1')->group(function (){
    Route::post('/user/login', 'LoginController@login');
});




