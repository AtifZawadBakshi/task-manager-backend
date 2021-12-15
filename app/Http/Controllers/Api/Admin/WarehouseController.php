<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Available;
use App\Models\PickupDeliveryMan;
use App\Models\Location;

class WarehouseController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth:admin-api', ['except' => ['index', 'show']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse = Warehouse::paginate(10);
        return response()->json([
            'status' => true,
            'data' => $warehouse
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
        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->post_code = $request->post_code;
        $warehouse->area = $request->area;
        $warehouse->district = $request->district;
        $warehouse->country = $request->country;
        $warehouse->save();

        return response()->json([
            'status' => true,
            'data' => $warehouse,
            'message' => 'Stored Successfully!'
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
        $warehouse = Warehouse::where('id', $id)->first();
        if($warehouse == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'data' => $warehouse,
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
        $warehouse = Warehouse::where('id', $id)->first();
        if($warehouse == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $warehouse->name = $request->name;
            $warehouse->post_code = $request->post_code;
            $warehouse->area = $request->area;
            $warehouse->district = $request->district;
            $warehouse->country = $request->country;
            $warehouse->update();
            return response()->json([
                'status' => true,
                'data' => $warehouse,
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
        $warehouse = Warehouse::where('id', $id)->first();
        if($warehouse == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $warehouse = Warehouse::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted Successfully!'
            ]);
        }
        
    }

    public function available(Request $request)
    {
        // return $warehouse_available = Warehouse::with('available')->get();
        // return $available_warehouse = Available::with('warehouse')->where('warehouse_id', $request->warehouse_id)->get();
        // return $location_warehouse = Available::with('location')->get();

        // $available = new Available();
        // $available->warehouse_id = $request->warehouse_id;
        // $available->location_id = $request->location_id;
        // $available->save();
        
        // $warehouse_available = Warehouse::with('available')->get();
        // $available_warehouse_location = Location::with('location')->get();
        $available_warehouse = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->get();
        return response()->json([
            'status' => true,
            'data' => $available_warehouse,
            // 'data' => $available, $available_warehouse, $warehouse_available,
            'message' => 'Available added Successfully!'
        ]);
    }

    public function available_denied($id)
    {
        $available = Available::where('id', $id)->first();
        if($available == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $available = Available::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }

    public function pickup_delivery_man(Request $request)
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

    public function pickup_delivery_man_denied($id)
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
