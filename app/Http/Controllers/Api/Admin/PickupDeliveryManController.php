<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PickupDeliveryMan;

class PickupDeliveryManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pickupDeliveryMan = PickupDeliveryMan::paginate(10);
        return response()->json([
            'status' => true,
            'data' => $pickupDeliveryMan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pickupDeliveryMan = new PickupDeliveryMan();
        $pickupDeliveryMan->user_id = $request->user_id;
        $pickupDeliveryMan->warehouse_id = $request->warehouse_id ;
        $pickupDeliveryMan->save();
        return response()->json([
            'status' => true,
            'data' => $pickupDeliveryMan,
            'message' => 'pickup_delivery_man assigned Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pickupDeliveryMan = PickupDeliveryMan::where('id', $id)->first();
        if($pickupDeliveryMan == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'data' => $pickupDeliveryMan,
            ]);
        }
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
        $pickupDeliveryMan = PickupDeliveryMan::where('id', $id)->first();
        if($pickupDeliveryMan == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $pickupDeliveryMan->user_id = $request->user_id;
            $pickupDeliveryMan->warehouse_id = $request->warehouse_id;
            $pickupDeliveryMan->update();
            return response()->json([
                'status' => true,
                'data' => $pickupDeliveryMan,
                'message' => 'Updated Successfully!'
            ]);
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
        $pickupDeliveryMan = PickupDeliveryMan::where('id', $id)->first();
        if($pickupDeliveryMan == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $pickupDeliveryMan = PickupDeliveryMan::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }
}
