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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
	//latihan 
	Route::group(['prefix' => 'pegawai'], function () {
	  Route::get('/layout', 'PegawaiController@layout')->name('layout');
	  Route::get('/add', 'PegawaiController@add')->name('add');
	  Route::post('/save', 'PegawaiController@save')->name('save');
	  Route::get('/edit/{id}', 'PegawaiController@edit')->name('edit');
	  Route::post('/update/{id}', 'PegawaiController@update')->name('update');
	  Route::get('/destroy/{id}', 'PegawaiController@destroy')->name('destroy');
	});

	//latihan 
	Route::group(['prefix' => 'jabatan'], function () {
	  Route::get('/', 'JabatanController@index')->name('jabatan');
	});

	Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');

});

