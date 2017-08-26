<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wallet;
use Illuminate\Database\QueryException;

class ViewWalletAmountController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $user_status = Wallet::where('user_ic', $ic)->pluck('amount');
            return $user_status->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}