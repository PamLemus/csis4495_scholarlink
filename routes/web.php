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

<<<<<<< HEAD
Route::get('/tutor/find','App\Http\Controllers\TutorController@listTutors')->name('tutor.filter'); 

Route::get('/tutor/results','App\Http\Controllers\TutorController@resultTutors')->name('tutor.results'); 
=======
Route::resource('tutor.course' , 'App\Http\Controllers\TutorCourseController');
>>>>>>> b20b44b5d9c970ca620275eb8d69387cd5c377e8

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
