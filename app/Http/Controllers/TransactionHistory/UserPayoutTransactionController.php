<?php

namespace App\Http\Controllers\TransactionHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransactionHistory;
use DB;
use Illuminate\Database\QueryException;

class UserPayoutTransactionController extends Controller
{
    private $type = 2;
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $payoutTransactions = TransactionHistory::where('type', $this->type)
                                ->where('user_ic', $ic)
                                ->get();

            return $payoutTransactions;
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}