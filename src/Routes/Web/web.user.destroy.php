<?php

Route::delete('/admin/users/{user}', 'UserController@destroy')->name('users.destroy');


