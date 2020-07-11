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


///Front end routes here------------------
Route::get('/', 'HomeController@index')->name('home');
Route::get('/singlePost/{id}', 'HomeController@single');

//Admin route here---------------------
Route::get('/home','ContentController@home')->middleware('Login');
Route::get('/content','ContentController@contentIndex')->middleware('Login');
Route::get('/DeleteContent/{id}','ContentController@contentDelete')->middleware('Login');
Route::post('/addContent','ContentController@contentAdd')->middleware('Login');
//Login route here---------------------
Route::get('/Login','LoginController@loginIndex');
Route::post('/onLogin','LoginController@onLogin');
Route::get('/onLogout','LoginController@onLogout');
