<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middlware' => 'auth'], function(){
    Route::group(['prefix' => '/Dashboard'], function(){
        Route::get('/{any}', 'HomeController@sparoutes')->where('any','.*');
        Route::get('/', 'HomeController@index')->name('home');
    });
});