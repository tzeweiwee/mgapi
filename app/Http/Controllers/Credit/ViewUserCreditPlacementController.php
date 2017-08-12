<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Placements;
use DB; 

class ViewUserCreditPlacementController extends Controller
{
    public function index(Request $data)
    {
        // $ic = $data->ic;
        // $result = DB::table('credit')
        //     ->where('user_ic', $ic)
        //     ->join('placements', 'credit.placement_id', '=', 'placements.id')
        //     ->select('credit.amount','placements.id')
        //     ->get();
    
        // return $result->toJson();
    }

}