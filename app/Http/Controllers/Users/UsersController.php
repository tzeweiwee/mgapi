<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class UsersController extends Controller
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
        try{
            $record = Users::where('ic', $id)->first();
            $recordFound = count($record);
            if($recordFound){
                return $record;
            }else{
                return json_encode(array("error" => "Error retrieving data: invalid ic"));
            }
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
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
            $record = Users::where('ic', $id)->first();
            $recordFound = count($record);
            if($recordFound){

                Users::where('ic', $id)->update($request->all());

                return json_encode(array("success" => "successfully updated data"));
            }else{
                return json_encode(array("error" => "Error updating data: missing mandatory data or invalid ic"));
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
            $recordFound = count(Users::where('ic', $id)->first());
            if($recordFound){

                $record = Users::where('ic', $id)->delete();

                return json_encode(array("success" => "successfully deleted data"));
            }else{
                return json_encode(array("error" => "Error deleting data: invalid ic"));
            }
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }
}
