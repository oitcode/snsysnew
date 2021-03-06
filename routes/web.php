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
    return redirect('/dashboard');
    //return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/dashboard');
});

/* Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* Worker */
Route::get('/worker', 'WorkerController@index')->name('worker');

/* Family */
Route::get('/family', 'FamilyController@index')->name('family');

/* Remittance */
Route::get('/remittance', 'RemittanceController@index')->name('remittance');

/* Public deposit */
Route::get('/submitistavrity', 'PublicSubmitController@index')->name('publicSubmit');

/* Change Password */
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
