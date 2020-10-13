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
    //return view('auth.login');
    return redirect('login');
});


Auth::routes();


Route::get('/beneficiaries', 'beneficiaries@index')->name('beneficiaries');
Route::post('/fetch-beneficiaries', 'beneficiaries@fetch_beneficiaries')->name('fetch_beneficiaries');
