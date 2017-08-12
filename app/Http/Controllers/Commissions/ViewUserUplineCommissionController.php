<?php

namespace App\Http\Controllers\Commissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Downlines;
use App\Commissions;

class ViewUserUplineCommissionController extends Controller
{
    public function index(Request $data)
    {
        $ic = $data->ic;
        $getUpline = Users::where('ic', $ic)->pluck('upline_user');
        $uplineIC = $getUpline->toArray();
        if(!is_null($uplineIC[0])){
            $downlineID = Downlines::where('parent_user_ic', $uplineIC[0])->pluck('id');
            $uplineCommission = Commissions::where('downline_id', $downlineID)->pluck('amount');
            return $uplineCommission->toJson();
        }else{
            return json_encode([null]);
        }

    }

}