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
    return view('welcome');
});

//Trung
//Code router cho thằng admin
Route::prefix('admin')->group(function () {

});

//Tien
//Code router cho thằng hospital
Route::prefix('dashboard')->group(function () {

    Route::get('/add-patient', 'DashboardController@getAddPatient');
    Route::post('/add-patient', 'DashboardController@postAddPatient');

    Route::get('/ajax-district/{idProvince}', 'AjaxController@getAjaxDistrict');
    Route::get('/ajax-ward/{idProvince}/{idDistrict}', 'AjaxController@getAjaxWard');

    Route::get('/add-record/{idPatient}', 'DashboardController@getAddRecord');
    Route::post('/add-record', 'DashboardController@postAddRecord');

    Route::post('/search', 'DashboardController@postSearch');
});
