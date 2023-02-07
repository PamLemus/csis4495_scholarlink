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
    return view('cover');
});

Route::get('/home','App\Http\Controllers\HomeController@list')->name('home');

Route::get('/tutor','App\Http\Controllers\TutorController@index')->name('tutor'); 

Route::get('/tutor/create','App\Http\Controllers\TutorController@create')->name('tutor.create');

Route::post('/tutor','App\Http\Controllers\TutorController@store')->name('tutor.store'); 

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
