<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;

class Cartcontroller extends Controller
{
    public function index()
    {
        $data=Cart::get();
        return $data;
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
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        // dd($request->all());
        $validator = Validator::make(
            $request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            $response['data'] =$validator->errors();
            return response()->json($response,200);
        }
        if($request->price=='')
            {
                $request->price= $request->large;
            }
        if($request->original_price=='')
        {
            $request->original_price= $request->large;
        }
        DB::beginTransaction();
            
        try {
            $create=Cart::create(
                [
                    "user_id" => 0,
                    "guest_id" => $request->guest_id,
                    "pizza_id" => $request->id,
                    "name" => $request->name,
                    "image" => $request->image,
                    "size" => $request->size,
                    "type" => $request->type,
                    "price" => $request->price,
                    "quantity" => $request->count,
                    "original_price" => $request->original_price,
                ]
            );     
            DB::commit();
            $response['data']=Cart::find($create->id);
            $response['status'] = true;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage()."line".$e->getLine();
            DB::rollback();
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Cart::where('guest_id',$id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //$response['data']=Cart::where('id',$id)
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
        // dd($id);
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        // dd($request->all());

        DB::beginTransaction();

        try {
            $response['data']=Cart::where('id',$id)->update(
                [
                    
                    "quantity" => $request->quantity,
                    "price" => $request->price,
                ]
            );     
            DB::commit();
            $response['status'] = true;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage()."line".$e->getLine();
            DB::rollback();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $data=Cart::where('id',$id)->delete();
        return $data;
    }
}