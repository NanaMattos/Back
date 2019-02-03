<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/patients', 'PatientController@create')->name('create_patients');

Route::get('/patients', 'PatientController@list')->name('list_patients');

Route::get('/patients/{id}', 'PatientController@show')->name('show_patients');

Route::put('/patients/{id}', 'PatientController@update')->name('update_patients');

Route::delete('/patients/{id}', 'PatientController@delete')->name('delete_patients');

Route::post('/doctors', 'DoctorController@create')->name('create_doctors');

Route::get('/doctors', 'DoctorController@list')->name('list_doctors');

Route::get('/doctors/{id}', 'DoctorController@show')->name('show_doctors');

Route::put('/doctors/{id}', 'DoctorController@update')->name('update_doctors');

Route::delete('/doctors/{id}', 'DoctorController@delete')->name('delete_doctors');
