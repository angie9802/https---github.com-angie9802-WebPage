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

Route::get('/get-client-data', 'DataController@get_Data') ;

Route::get('/formulas','MessagesController@index')->name('formulas');

Route::get('/charts', 'ChartController@index')->name('charts');

Route::post('chart/fetch_data', 'ChartController@fetch_data');

Route::get('/menu', function () {
    return view('menu');
});
Route::get('/physiotherapy', function () {
    return view('physiotherapy');
});
Route::get('/data', function () {
    return view('data');
});

Route::get('/formulas1', function () {
    return view('formulas');
});

Auth::routes();


