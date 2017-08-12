<?php

namespace App\Http\Controllers\PayoutRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PayoutRequests;

class ViewUserRequestsController extends Controller
{
    public function index(Request $data)
    {
        $ic = $data->ic;
        $payouts = PayoutRequests::where('user_ic', $ic)->get();
        return $payouts->toJson(); //returns in json
    }

}
