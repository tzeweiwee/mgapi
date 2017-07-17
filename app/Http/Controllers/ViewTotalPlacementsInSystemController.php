<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Placement;

class ViewTotalPlacementsInSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placements = Placement::count();
        return $placements; //returns in json
    }

}
