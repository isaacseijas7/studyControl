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

	Route::get('academic_periods/dataTable', 'AcademicPeriodController@dataTable')->name("academic_periods.dataTable");
	Route::resource('academic_periods','AcademicPeriodController');
	

	Route::get('representatives/dataTable', 'RepresentativeController@dataTable')->name("representatives.dataTable");
	Route::resource('representatives','RepresentativeController');
	Route::get('representatives/delete/{representative}', 'RepresentativeController@destroy')->name('representatives.delete');
	

	Route::get('students/dataTable', 'StudentController@dataTable')->name("students.dataTable");
	Route::resource('students','StudentController');
	Route::get('students/inscribe/{student}', 'StudentController@inscribe')->name('students.inscribe');
	Route::get('students/delete/{student}', 'StudentController@destroy')->name('students.delete');


	//inscriptions
	Route::resource('inscriptions','InscriptionController');


	
	
});

Route::get('/home', 'HomeController@index')->name('home');
