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

Route::get('/data-dashboard', 'DataDashboardController@index')->name('datadashboard');

Route::post('/volume-chart','DataDashboardController@volume_chart');
Route::post('/terminal-prediction','DataDashboardController@terminal_prediction');
Route::post('/top-widget','DataDashboardController@top_widget');
Route::post('/fetch-shipping-line','DataDashboardController@fetch_shipping_line');

Route::post('/fetch-commodity','DataDashboardController@fetch_commodity');

Route::post('/fetch-commodity-rail-data','DataDashboardController@fetch_commodity_rail_data');
Route::post('/fetch-icd-rail-data','DataDashboardController@fetch_icd_rail_data');

Route::post('/fetch-shipping-line-share','DataDashboardController@fetch_shipping_line_share');

// Routing URLs of Prediction dashboard 
Route::prefix('prediction-dashboard')->group(function () {
	Route::get('/', 'PredictionDashboardController@index')->name('predictiondashboard');
    Route::post('/terminal-prediction','PredictionDashboardController@terminal_prediction');
     Route::post('/fetch-commodity','PredictionDashboardController@fetch_commodity');
     Route::post('/fetch-commodity-wise-prediction','PredictionDashboardController@fetch_commodity_wise_prediction');
});


Route::get('/beneficiaries', 'beneficiaries@index')->name('beneficiaries');
Route::post('/fetch-beneficiaries', 'beneficiaries@fetch_beneficiaries')->name('fetch_beneficiaries');





/*Route::get('/data-dashboard', function () {
    return view('datadashboard');
});*/
