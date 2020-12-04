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



Route::view('/','home')->name('home');

Route::get('/data','DataController@index')->name('data');

Route::get('/contact','ContactController@index')->name('contact');

//Route::post('data','PostingController@store');

Route::get('/portafolio','PortafolioController@index')->name('portafolio');

Route::get('/action.php');

Route::get('/get-client-data', 'DataController@get_Data') ;

//Route::resource('data', 'DataController');

Auth::routes();


