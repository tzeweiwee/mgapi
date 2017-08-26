<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use Illuminate\Database\QueryException;

class ViewUserUplineController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $uplineUserIC = Users::where('ic', $ic)->pluck('upline_user');
            return $uplineUserIC->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
        
    }

}
