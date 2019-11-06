<?php

use Illuminate\Http\Request;


Route::prefix('v1')->name('av1.')->group(function () {

    Route::post('login',    'API\APIAuthController@login');
    Route::post('register', 'API\APIAuthController@register');
});


#Just for testing,... no need in production..............................
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#Guarded routes...................................
Route::middleware('auth:api')->group(function () {

    Route::prefix('v1')->name('av1.')->group(function () {

        Route::prefix('group')->name('grp.')->group(function () {

            Route::get('/',             'Api\GroupController@__getList')->name('lnk1');
            Route::post('/add',         'Api\GroupController@__create')->name('lnk2');
            Route::post('/update/{idd}',    'Api\GroupController@__update')->name('lnk3');
            Route::post('/delete/{idd}',    'Api\GroupController@__delete')->name('lnk4');
        });
    });
});

