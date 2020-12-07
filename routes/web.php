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

Route::get('/data','DataController@index')->name('data')
        ->middleware('auth');

Route::get('/contact','ContactController@index')->name('contact')
        ->middleware('auth');

Route::get('/portafolio','PortafolioController@index')->name('portafolio')
        ->middleware('auth');

Route::get('/get-client-data', 'DataController@get_Data');

Route::get('/formulas','FormulasController@index')->name('formulas')
        ->middleware('auth');

Route::post('/formulas','FormulasController@store')->name('formulas.store');

Route::get('/physiotherapy','PhysiotherapyController@index')->name('physiotherapy')
        ->middleware('auth');;

Route::get('/get-client-data-p', 'PhysiotherapyController@get_Data') ;




Route::get('/menu', function () { return view('menu');})
        ->middleware('auth');
/*
Route::get('/data', function () {
    return view('data');
});*/


Auth::routes();


