<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('home');
});

/*DOCUMENTACION*/
Route::group(['prefix'=>'doc'], function(){
	Route::get('/', function(){return view('ejemplos');});    
});

/*REGISTROS*/
Route::group(['prefix'=>'clients'], function(){
    
    Route::get('/',['uses'=>'ClientController@index']);
    Route::get('create',['uses'=>'ClientController@create']);
    Route::post('store',['uses'=>'ClientController@store']);
    Route::get('edit/{id}',['uses'=>'ClientController@edit']);
    Route::post('update',['uses'=>'ClientController@update']);
    Route::get('destroy/{id}',['uses'=>'ClientController@destroy']);
    Route::get('status/{id}',['uses'=>'ClientController@status']);
});

/*EJEMPLOS*/
Route::group(['prefix'=>'eje'], function(){
	Route::get('/', function(){return view('ejemplos');});    
});