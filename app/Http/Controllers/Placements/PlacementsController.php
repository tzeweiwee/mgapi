<?php

namespace App\Http\Controllers\Placements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Placement;

class PlacementsController extends Controller
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
        //
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
        try{
            $validator = Validator::make($request->all(), [
                'user_ic' => 'required',
            ]);

            $recordFound = count(Placement::where('id', $id)->first());
            
            if($validator->fails() || !$recordFound){ 
                return json_encode(array("error" => "Error updating data: missing mandatory data or invalid id"));
            }else{
                Placement::where('id', $id)->update($request->except(['user_ic']));
                return json_encode(array("success" => "successfully updated data"));
            }
               
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
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
            $recordFound = count(Placement::where('id', $id)->first());
            if($recordFound){

                $record = Placement::find($id);
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
