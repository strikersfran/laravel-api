<?php

//use Illuminate\Http\Request;

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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');
Route::group(['prefix' => 'v1','middleware' => 'verify-client'], function () {
        
    Route::post('test', function(){ return '<h1>EL API ESTA FUNCIONANDO</h1>';});
    Route::post('auth/login', ['as' => 'auth.login','uses' => 'Api\AuthController@login']);
    
    Route::group(['middleware' => 'jwt-auth'], function () {        
        //Route::post('auth/list', ['as' => 'auth.list','uses' => 'Api\AuthController@listUsers']);
        Route::resource('users', 'Api\UsersController');
    });
    
});

//Route::group(['prefix' => 'v1','namespace' => 'Api'], function () {
//
//    Route::get('test', function(){ return '<h1>EL API ESTA FUNCIONANDO</h1>';});
//    
//    Route::post('/auth/register', ['as' => 'auth.register','uses' => 'AuthController@register']);
//    Route::post('/auth/login', ['as' => 'auth.login','uses' => 'AuthController@login']);
//    
//    Route::group(['middleware' => 'jwt-auth'], function () {
//        Route::post('/auth/list', ['as' => 'auth.list','uses' => 'AuthController@listUsers']);
//    });
//    
//});