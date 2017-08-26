<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Credit;
use App\Placement;
use DB;
use Illuminate\Database\QueryException;

class ViewUserCreditPlacementController extends Controller
{
    public function index(Request $data)
    {
        try{
            $ic = Users::where('ic', $data->ic)->pluck('ic');

            $credits = Credit::where('user_ic', $ic)->get();
            $credits = $credits->toArray();

            $placementIds = array();
            foreach ($credits as $key) {
                 array_push($placementIds, intval($key["placement_id"]));
            }

            $placements = Placement::whereIn('id', $placementIds)->get();

            return $placements;

        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

}