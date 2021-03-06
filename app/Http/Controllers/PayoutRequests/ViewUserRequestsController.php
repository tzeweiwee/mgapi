<?php

namespace App\Http\Controllers\PayoutRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PayoutRequests;
use Illuminate\Database\QueryException;

class ViewUserRequestsController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $payouts = PayoutRequests::where('user_ic', $ic)->get();
            return $payouts->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
        
    }

}
