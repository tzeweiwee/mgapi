<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

class ViewUserUplineController extends Controller
{
    public function index(Request $data)
    {
        $ic = $data->ic;
        $uplineUserIC = Users::where('ic', $ic)->pluck('upline_user');
        return $uplineUserIC->toJson(); //returns in json
    }

}
