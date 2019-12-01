<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('/dashboard', function (){
         return view(config('gatekeeper.views.pages.dashboard'));
    })->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () use (&$space) {
        Route::get('edit', $space.'GatekeeperUserController@editProfile')->name('edit');
        Route::put('/', $space.'GatekeeperUserController@updateProfile')->name('update');
        Route::put('/password', $space.'GatekeeperUserController@passwordProfile')->name('update.password');
    });

    Route::prefix('admin')->group(function () {
        Route::patch('users/changePassword/{user}', 'AdminController@changePassword');

        Route::get('users/create', 'AdminController@create')->name('users.create');
        Route::delete('users/{user}', 'AdminController@destroy')->name('users.destroy');
        Route::patch('users/{user}/edit', 'AdminController@edit')->name('users.edit');
        Route::get('users', 'AdminController@index')->name('users.index');
        Route::get('users/{user}', 'AdminController@show')->name('users.show');
        Route::post('users', 'AdminController@store')->name('users.store');
        Route::patch('users/{user}', 'AdminController@update')->name('users.update');

    });

});

