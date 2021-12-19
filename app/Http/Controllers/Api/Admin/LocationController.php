<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::paginate(10);
        return response()->json([
            'status' => true,
            'data' => $location
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
        $location = new Location();
        $location->division = $request->division;
        $location->district = $request->district ;
        $location->area = $request->area;
        $location->thana = $request->thana ;
        $location->post_code = $request->post_code;
        $location->home_delivery = $request->home_delivery ;
        $location->lockdown = $request->lockdown;
        $location->base_charge = $request->base_charge ;
        $location->per_kg_inside_dhaka_charge = $request->per_kg_inside_dhaka_charge;
        $location->per_kg_outside_dhaka_charge = $request->per_kg_outside_dhaka_charge ;
        $location->cod_charge_outside_of_dhaka = $request->cod_charge_outside_of_dhaka;
        $location->cod_charge_inside_of_dhaka = $request->cod_charge_inside_of_dhaka ;
        $location->save();
        return response()->json([
            'status' => true,
            'data' => $location,
            'message' => 'Location stored Successfully!'
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
        $location = Location::where('id', $id)->first();
        if($location == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'data' => $location,
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
        $location = Location::where('id', $id)->first();
        if($location == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $location->division = $request->division;
            $location->district = $request->district ;
            $location->area = $request->area;
            $location->thana = $request->thana ;
            $location->post_code = $request->post_code;
            $location->home_delivery = $request->home_delivery ;
            $location->lockdown = $request->lockdown;
            $location->base_charge = $request->base_charge ;
            $location->per_kg_inside_dhaka_charge = $request->per_kg_inside_dhaka_charge;
            $location->per_kg_outside_dhaka_charge = $request->per_kg_outside_dhaka_charge ;
            $location->cod_charge_outside_of_dhaka = $request->cod_charge_outside_of_dhaka;
            $location->cod_charge_inside_of_dhaka = $request->cod_charge_inside_of_dhaka ;
            $location->update();
            return response()->json([
                'status' => true,
                'data' => $location,
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
        $location = Location::where('id', $id)->first();
        if($location == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $location = Location::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }

}
