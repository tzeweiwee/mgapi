<?php

namespace App\Http\Controllers\Cycles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cycle;
use Illuminate\Database\QueryException;

class ViewTotalCompleteCyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $cycles = Cycle::where('id', 1)->pluck('number_of_cycle');
            return $cycles-toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
        
    }

}
