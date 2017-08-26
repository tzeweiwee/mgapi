<?php

namespace App\Http\Controllers\Placements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Placement;
use Illuminate\Database\QueryException;

class ViewTotalPlacementsInSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $placements = Placement::count();
            return $placements->toJson(); //returns in json
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
        
    }

}
