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

Route::group(['prefix' => '/admin'], function ($router) {
    Route::resource('/company','CompanyController',['except' => ['edit','update','destroy']]);
    Route::put('/company/{company}','companyController@update');
    Route::delete('/company/{company}','CompanyController@destroy');
    Route::get('/company/{company}/edit','CompanyController@edit');

    Route::resource('/employee','EmployeeController',['except' => ['edit','update','destroy']]);
    Route::put('/employee/{employee}','EmployeeController@update');
    Route::delete('/employee/{employee}','EmployeeController@destroy');
    Route::get('/employee/{employee}/edit','EmployeeController@edit');
});
