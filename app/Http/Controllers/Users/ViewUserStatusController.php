<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use Illuminate\Database\QueryException;

class ViewUserStatusController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $user_status = Users::where('ic', $ic)->pluck('status');
            return $user_status->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
       
    }

}
