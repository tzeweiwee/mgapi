<?php

namespace App\Http\Controllers\TransactionHistory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransactionHistory;
use DB;
use Illuminate\Database\QueryException;

class TransactionHistoryController extends Controller
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
            if($request->user_ic && $request->type && $request->amount){
                $request->status ? $status = $request->status : $status = null;
                $request->reference_id ? $reference_id = $request->reference_id : $reference_id = null;
                $request->placement_id ? $reference_id = $request->placement_id : $placement_id = null;

                $mappedData = array(
                    'user_ic' => $request->user_ic,
                    'type' => $request->type,
                    'amount' => $request->amount,
                    'status' => $request->status,
                    'reference_id' => $request->reference_id,
                    'placement_id' => $request->placement_id,
                );

                $newData = new TransactionHistory($mappedData);

                $newData->save(); 
                return json_encode(array("success" => "successfully inserted data"));
            }else{
                return json_encode(array("error" => "Error inserting data: missing mandatory data"));
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
        try{
            $recordFound = count(TransactionHistory::where('id', $id)->first());
            if($request->user_ic && $request->type && $recordFound){

                TransactionHistory::where('id', $id)->update($request->except(['user_ic', 'type']));

                return json_encode(array("success" => "successfully updated data"));
            }else{
                return json_encode(array("error" => "Error updating data: missing mandatory data or invalid transaction id"));
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
            $recordFound = count(TransactionHistory::where('id', $id)->first());
            if($recordFound){

                $record = TransactionHistory::find($id);
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
