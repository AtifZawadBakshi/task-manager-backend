<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Available;
use App\Models\Location;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Validator;

class AvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Available::get();
        $availables = Available::with('warehouse','location')->orderBy('id', 'DESC')->paginate(10);
        // $available_warehouse_location = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->first();
        return response()->json($availables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_id' => 'required',
            'warehouse_id' => 'required|unique:availables,warehouse_id,NULL,id,location_id,' . $request->location_id,
        ],
        [
            'warehouse_id.required' => 'The warehouse id field is required.'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $available = Available::with('warehouse','location')->where('id', $id)->first();
        $available = [
            'location_id' => $available->location_id, 'location_area'=> $available->location->area,
            'warehouse_id' => $available->warehouse_id,
            'id' => $id
        ];
        return $available;

        // if($available == null){
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Not Found!'
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => true,
        //         'data' => $available,
        //     ]);
        // }
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
        // $validator = Validator::make($request->all(), [
        //     'location_id' => 'required',
        //     'warehouse_id' => 'required|unique:availables,warehouse_id,NULL,id,location_id,' . $request->location_id,
        // ],
        // [
        //     'warehouse_id.required' => 'The warehouse id field is required.'
        // ]);
        // if ($validator->fails()) {
        //     $data['status'] = false;
        //     $data['errors'] = $validator->errors();
        //     return response()->json($data, 422);
        // }

        $available = Available::where('id', $id)->first();
        if($available == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $available->warehouse_id = $request->warehouse_id;
            $available->location_id = $request->location_id;
            $available->update();
            return response()->json([
                'status' => true,
                'data' => $available,
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

    public function available_warehouse_location(Request $request)
    {
        $available_warehouse_location = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->first();
        if($available_warehouse_location == NULL){
            return response()->json([
                'status' => true,
                'message' => 'Available warehouse Not Found!'
            ]);
        }else{
            // $available_warehouse_location = Available::with('warehouse','location')->where('warehouse_id', $request->warehouse_id)->where('location_id', $request->location_id)->get();
            return response()->json([
                'status' => true,
                'data' => $available_warehouse_location,
                'message' => 'Available warehouse Found Successfully!'
            ]);
        }
    }
}
