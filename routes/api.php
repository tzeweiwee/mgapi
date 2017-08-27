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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('/auth/register', 'Auth\UserController@register');
Route::post('/auth/login', 'Auth\UserController@login');
// Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('/placements/total',"Placements\ViewTotalPlacementsInSystemController@index");
    Route::get('/cycles/total',"Cycles\ViewTotalCompleteCyclesController@index");
    Route::get('/users/{ic}/status', ['uses' =>"Users\ViewUserStatusController@index"]);
    Route::get('/payoutrequest/users/{ic}', ['uses' =>"PayoutRequests\ViewUserRequestsController@index"]);
    Route::get('/downlines/user/{ic}', ['uses' =>"Downlines\ViewUserDownlinesController@index"]);
    Route::get('/wallet/{ic}/amount', ['uses' =>"Wallet\ViewWalletAmountController@index"]);
    Route::get('/commissions/{ic}/upline', ['uses' =>"Commissions\ViewUserUplineCommissionController@index"]);
    Route::get('/commissions/{ic}/downlines', ['uses' =>"Commissions\ViewUserDownlinesCommissionController@index"]);
    Route::get('/credit/{ic}/placements', ['uses' =>"Credit\ViewUserCreditPlacementController@index"]);

    //users
    Route::resource('/users', 'Users\UsersController', 
        ['only' => ['show', 'update', 'destroy'], 'parameters' => ['user' => 'ic']]);
    Route::get('/users/{ic}/upline', ['uses' =>"Users\ViewUserUplineController@index"]);
    Route::get('/users/{ic}/status', ['uses' =>"Users\ViewUserStatusController@index"]);

    //transaction history
    Route::resource('/transactionhistory', 'TransactionHistory\TransactionHistoryController', 
        ['only' => ['update', 'store', 'destroy']]);
    Route::get('/transactionhistory/requestpayout/{ic}', ['uses' =>"TransactionHistory\UserRequestPayoutController@index"]);
    Route::get('/transactionhistory/payouttransaction/{ic}', ['uses' =>"TransactionHistory\UserPayoutTransactionController@index"]);
    Route::get('/transactionhistory/creditaddin/{ic}', ['uses' =>"TransactionHistory\UserCreditAddInController@index"]);
    Route::get('/transactionhistory/{ic}', ['uses'=>'TransactionHistory\UserHistoryListController@index']);
// });