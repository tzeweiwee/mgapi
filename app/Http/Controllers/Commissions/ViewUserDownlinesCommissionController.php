<?php

namespace App\Http\Controllers\Commissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Downlines;
use App\Commissions;
use DB; 

class ViewUserDownlinesCommissionController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $result = DB::table('users')
                ->where('upline_user', $ic)
                ->join('downlines', 'users.ic', '=', 'downlines.referred_user_ic')
                ->join('commissions', 'downlines.id', '=', 'commissions.downline_id')
                ->select('users.username','users.email', 'commissions.amount')
                ->get();
            return $result->toJson();
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}