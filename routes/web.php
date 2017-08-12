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
