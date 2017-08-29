<?php

namespace App\Http\Controllers\Credit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Credit;
use Validator;

class CreditController extends Controller
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
                'ic' => 'required',
                'placement_id' => 'required',
            ]);

            if($validator->fails()){
                return json_encode(array('error' => 'missing mandatory fields'));
            }else{

                $request->get('amount') ? $amount = $request->get('amount') : $amount = 1590.00;

                $mappedData = array(
                    'user_ic' => $request->user_ic,
                    'amount' => $amount,
                    'placement_id' => $request->placement_id,
                );

                $newData = new Credit($mappedData);
                $newData->save();

                return json_encode(array('success' => 'successfully created credit'));
            }

        }catch(QueryException $e){
            return json_encode(array('error' => 'error inserting data'));
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
        $validator = Validator::make($request->all(), [
            'user_ic' => 'required',
        ]);

        if($validator->fails()){
            return json_encode(array('error' => 'missing mandatory fields'));
        }else{

            Credit::where('id', $id)->where('user_ic', $request->user_ic)->update($request->except(['user_ic', 'id']));
            $newData->save();

            return json_encode(array('success' => 'successfully created credit'));
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
            $recordFound = count(Credit::where('id', $id)->first());
            if($recordFound){

                $record = Credit::find($id);
                $record->delete();

                return json_encode(array("success" => "successfully deleted data"));
            }else{
                return json_encode(array("error" => "Error deleting data: invalid transaction id"));
            }
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }
}
