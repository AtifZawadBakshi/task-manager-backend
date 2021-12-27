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
        $warehouses = Warehouse::get();
        return response()->json($warehouses);
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
            return response()->json(
                $warehouse,
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

    // public function warehouse_info(){
    //     $warehouse_info = Warehouse::with('pickup_delivery_man','available')->first();
    //     return response()->json([
    //         'status' => true,
    //         'data' => $warehouse_info,
    //         'message' => 'warehouse Info Found Successfully!'
    //     ]);
    // }

    public function available(Request $request)
    {
        $available = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->first();
        if($available == NULL){
            return response()->json([
                'status' => true,
                'message' => 'Available warehouse Not Found!'
            ]);
        }else{
            $available = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->get();
            return response()->json([
                'status' => true,
                'data' => $available,
                'message' => 'Available warehouse Found Successfully!'
            ]);
        }
    }

    public function warehouseSearch($name) 
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $name);

        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        $warehouse_search = Warehouse::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->Where('name', 'like', "%{$value}%");
            }
        })->get();
        return response()->json(
            $warehouse_search
        );
    }
    
}
