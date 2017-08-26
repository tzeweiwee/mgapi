<?php

namespace App\Http\Controllers\Downlines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Downlines;
use Illuminate\Database\QueryException;

class ViewUserDownlinesController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = $data->ic;
            $downlines = Downlines::where('parent_user_ic', $ic)->get();
            return $downlines->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}
