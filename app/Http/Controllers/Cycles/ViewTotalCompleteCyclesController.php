<?php

namespace App\Http\Controllers\Cycles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cycle;

class ViewTotalCompleteCyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cycles = Cycle::where('id', 1)->pluck('number_of_cycle');
        return $cycles-toJson(); //returns in json
    }

}
