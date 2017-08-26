<?php

namespace App\Http\Controllers\TransactionHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransactionHistory;
use DB;
use Illuminate\Database\QueryException;

class UserHistoryListController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $list = TransactionHistory::where('user_ic', $ic)
                                ->get();

            return $list;
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}