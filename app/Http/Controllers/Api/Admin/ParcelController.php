<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel;
// use App\Models\Location;
// use App\Models\Available;
// use App\Models\Merchant;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels = Parcel::paginate(10);
        return response()->json($parcels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'store';
        $parcel = new Parcel();
        $parcel->merchant_id = $request->merchant_id;
        $parcel->available_id = $request->available_id ;
        $parcel->pickup_location_id = $request->pickup_location_id ;
        $parcel->delivery_location_id = $request->delivery_location_id ;
        $parcel->pickup_warehouse_id = $request->pickup_warehouse_id ;
        $parcel->delivery_warehouse_id = $request->delivery_warehouse_id ;
        $parcel->order_no  = $request->order_no ;
        $parcel->customer_name = $request->customer_name ;
        $parcel->customer_number = $request->customer_number;
        $parcel->customer_email = $request->customer_email ;
        $parcel->customer_address = $request->customer_address;
        $parcel->customer_zip_code = $request->customer_zip_code ;
        $parcel->customer_city = $request->customer_city;
        $parcel->status = $request->status ;
        $parcel->save();
        return response()->json([
            'status' => true,
            'data' => $parcel,
            'message' => 'Parcel stored Successfully!'
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
        $parcel = Parcel::where('id', $id)->first();
        if($parcel == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json(
                $parcel
            );
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
        $parcel = Parcel::where('id', $id)->first();
        if($parcel == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $parcel->merchant_id = $request->merchant_id;
            $parcel->available_id = $request->available_id ;
            $parcel->pickup_location_id = $request->pickup_location_id ;
            $parcel->delivery_location_id = $request->delivery_location_id ;
            $parcel->pickup_warehouse_id = $request->pickup_warehouse_id ;
            $parcel->delivery_warehouse_id = $request->delivery_warehouse_id ;
            $parcel->order_no  = $request->order_no ;
            $parcel->customer_name = $request->customer_name ;
            $parcel->customer_number = $request->customer_number;
            $parcel->customer_email = $request->customer_email ;
            $parcel->customer_address = $request->customer_address;
            $parcel->customer_zip_code = $request->customer_zip_code ;
            $parcel->customer_city = $request->customer_city;
            $parcel->status = $request->status ;
            $parcel->update();
            return response()->json([
                'status' => true,
                'data' => $parcel,
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
        $parcel = Parcel::where('id', $id)->first();
        if($parcel == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $parcel = Parcel::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }

    public function parcel_info(Request $request){
        // return 'location_parcel';
        $location_parcel = Parcel::with('merchant', 'user', 'location', 'available', 'product')->where('user_id', $request->user_id)->first();
        return response()->json([
            'status' => true,
            'data' => $location_parcel,
            'message' => 'Found Location Successfully!'
        ]);
    }
}
