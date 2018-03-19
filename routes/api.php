<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('basic-auth', function(){
    return response()
        ->json([
            'status' => 'ok',
        ]);
})->middleware('auth.basic.once');


Route::get('plain/users', function() {
    return response()
        ->json(\DB::table('users')->select()->limit(20)->get());
});

Route::get('oauth2/users', function(){

    return response()
        ->json(\DB::table('users')->select()->limit(20)->get());

})->middleware('auth:api');