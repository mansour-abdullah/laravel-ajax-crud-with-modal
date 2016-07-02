<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::auth();*/

Route::get('/', [
 'uses' => 'CarController@index' , 
    'as' => 'home'
] );

Route::get('/edit/{id}', [
'uses' => 'CarController@edit' ,
    'as' => 'car.edit'
] );

Route::post('/update', [
'uses' => 'CarController@update' ,
    'as' => 'car.update'
] );

Route::POST('/delete/{id}', [
'uses' => 'CarController@delete' ,
    'as' => 'car.delete'
] );

Route::POST('/add', [
'uses' => 'CarController@add' ,
    'as' => 'car.add'
] );
