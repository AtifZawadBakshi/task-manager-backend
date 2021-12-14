<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Available;

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
        $warehouse = Warehouse::all();
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
        $available = new Available();
        $available->warehouse_id = $request->warehouse_id;
        $available->location_id = $request->location_id;
        $available->save();
        return response()->json([
            'status' => true,
            'data' => $available,
            'message' => 'Available added Successfully!'
        ]);
    }
}