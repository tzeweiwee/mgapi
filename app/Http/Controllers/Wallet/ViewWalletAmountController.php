<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wallet;

class ViewWalletAmountController extends Controller
{
    public function index(Request $data)
    {
        $ic = $data->ic;
        $user_status = Wallet::where('user_ic', $ic)->pluck('amount');
        return $user_status; //returns in json
    }

}