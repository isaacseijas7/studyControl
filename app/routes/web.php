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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Rutas administración
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){

	Route::get('students/createRegular','StudentController@createRegular')->name('students.createRegular');
	Route::resource('students','StudentController');
	
	Route::resource('academic_periods','AcademicPeriodController');
	
});

Route::get('/home', 'HomeController@index')->name('home');
