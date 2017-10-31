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
// Route::get('/home', 'HomeController@index')->name('home');



//admin section
Route::get('/admin/login', 'Auth\AdminController@showLogin');
Route::get('mgapi/admin/home', 'Admin\AdminPagesController@index')->name('adminHome');

//cycle
Route::group(['middleware' => 'auth'], function(){ 
    Route::get('mgapi/admin/showCycles', 'Admin\AdminPagesController@showCycles')->name('showCycles');
    Route::get('mgapi/admin/registerNewUser', 'Admin\AdminPagesController@showUserRegistrationForm')->name('registerNewUserForm');
    Route::get('mgapi/admin/removeUser', 'Admin\AdminPagesController@showUserRemovalForm')->name('removeUserForm');
    Route::get('mgapi/admin/viewAllUsers', 'Admin\AdminPagesController@showAllUsers')->name('viewAllUsers');
    Route::get('mgapi/admin/showAllTransactionHistory', 'Admin\AdminPagesController@showAllTransactionHistory')->name('showAllTransactionHistory');
    Route::get('mgapi/admin/showAllWallet', 'Admin\AdminPagesController@showAllWallet')->name('showAllWallet');
});

Auth::routes();
