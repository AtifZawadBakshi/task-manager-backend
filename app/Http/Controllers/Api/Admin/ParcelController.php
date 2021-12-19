<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\Location;
use App\Models\Available;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcel = Parcel::paginate(10);
        return response()->json([
            'status' => true,
            'data' => $parcel
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
        $parcel = new Parcel();
        $parcel->user_id = $request->user_id;
        $parcel->available_id = $request->available_id ;
        $parcel->order_no  = $request->order_no ;
        $parcel->product_id = $request->product_id ;
        $parcel->location_id = $request->location_id;
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
            return response()->json([
                'status' => true,
                'data' => $parcel,
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
        $parcel = Parcel::where('id', $id)->first();
        if($parcel == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $parcel->user_id = $request->user_id;
            $parcel->available_id = $request->available_id ;
            $parcel->order_no  = $request->order_no ;
            $parcel->product_id = $request->product_id ;
            $parcel->location_id = $request->location_id;
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
        $location_parcel = Parcel::with('user', 'location', 'available', 'product')->where('user_id', $request->user_id)->first();
        return response()->json([
            'status' => true,
            'data' => $location_parcel,
            'message' => 'Found Location Successfully!'
        ]);
    }
}
