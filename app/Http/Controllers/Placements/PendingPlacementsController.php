<?php

namespace App\Http\Controllers\Placements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PendingPlacements;
use Validator;

class PendingPlacementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'user_ic' => 'required',
            ]);

            if($validator->fails()){
               
                return json_encode(array("error" => "Error inserting data: missing mandatory data"));
            }else{
                $request->status ? $status = $request->status : $status = null;
              
                $mappedData = array(
                    'user_ic' => $request->user_ic,
                    'status' => $request->status,
                );

                $newData = new PendingPlacements($mappedData);

                $newData->save(); 
                return json_encode(array("success" => "successfully inserted data"));
            }
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $recordFound = count(PendingPlacements::where('id', $id)->first());
            if($recordFound){

                $record = PendingPlacements::find($id);
                $record->delete();

                return json_encode(array("success" => "successfully deleted data"));
            }else{
                return json_encode(array("error" => "Error deleting data: invalid id"));
            }
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }
}
