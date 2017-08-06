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

Route::get('/', 'PagesController@index');
// Route::resource('cycles','Cycles\ViewTotalCompleteCyclesController');
// Route::resource('placements','Placements\ViewTotalPlacementsInSystemController');
// Route::resource('users','UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//temporarily placing the routes here, in later dev we have to use api.php
Route::get('placements/total',"Placements\ViewTotalPlacementsInSystemController@index");
Route::get('cycles/total',"Cycles\ViewTotalCompleteCyclesController@index");
Route::get('users/{ic}/status', ['uses' =>"Users\ViewUserStatusController@index"]);
Route::get('/payoutrequest/users/{ic}', ['uses' =>"PayoutRequests\ViewUserRequestsController@index"]);
Route::get('/downlines/user/{ic}', ['uses' =>"Downlines\ViewUserDownlinesController@index"]);
Route::get('/users/{ic}/upline', ['uses' =>"Users\ViewUserUplineController@index"]);
Route::get('/wallet/{ic}/amount', ['uses' =>"Wallet\ViewWalletAmountController@index"]);
