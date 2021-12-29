<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerchantUser;
use Illuminate\Support\Facades\Validator;

class MerchantUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        $merchantUsers = MerchantUser::paginate(10);
        return response()->json($merchantUsers);
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
            'merchant_id' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }
        // return 'store';
        $merchantUser = new MerchantUser();
        $merchantUser->merchant_id = $request->merchant_id;
        $merchantUser->user_id = $request->user_id;
        $merchantUser->save();
        return response()->json([
            'status' => true,
            'data' => $merchantUser,
            'message' => 'MerchantUser stored Successfully!'
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
        // return 'show';
        $merchantUser = MerchantUser::where('id', $id)->first();
        if($merchantUser == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'data' => $merchantUser,
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
        // return 'update';
        $merchantUser = MerchantUser::where('id', $id)->first();
        if($merchantUser == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $merchantUser->merchant_id = $request->merchant_id;
            $merchantUser->user_id = $request->user_id;
            $merchantUser->update();
            return response()->json([
                'status' => true,
                'data' => $merchantUser,
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
        // return 'destroy';
        $merchantUser = MerchantUser::where('id', $id)->first();
        if($merchantUser == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $merchantUser = MerchantUser::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }

    public function merchant_user_info(Request $request){
        // return 'location_parcel';
        return $merchant_user_info = MerchantUser::with('merchant', 'user')->where('user_id', $request->user_id)->first();
        return response()->json([
            'status' => true,
            'data' => $merchant_user_info,
            'message' => 'Found Merchant Successfully!'
        ]);
    }
}
