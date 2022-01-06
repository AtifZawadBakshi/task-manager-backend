<?php

namespace App\Http\Controllers\Api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Validator;
use App\Models\Regulation;
// use Illuminate\Support\Facades\Auth;
// use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Http\Middleware\Authenticate;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        $issues = Issue::with('regulations')->get();
        return response()->json($issues);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // array('user'=>Auth::user()->name,'history_type'=>'inserted','path'=>url()->current());
        // return auth('admin-api')->user();
        // return 'store';
        $validator = Validator::make($request->all(), [
            'medium' => 'required',
            'order_id' => 'required',
            'date_of_issue' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'main_category' => 'required',
            // 'sub_category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $issues = new Issue();
        $issues->medium = $request->medium;
        $issues->order_id = $request->order_id;
        $issues->date_of_issue = $request->date_of_issue ;
        $issues->product_type = $request->product_type;
        $issues->category = $request->category ;
        $issues->main_category = $request->main_category;
        $issues->sub_category = $request->sub_category ;
        $issues->status = $request->status ;
        $issues->created_by = auth('admin-api')->user()->id;
        $issues->save();
        return response()->json([
            'status' => true,
            'data' => $issues,
            'message' => 'Issue stored Successfully!'
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
        $issues = Issue::where('id', $id)->first();
        if($issues == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json(
                $issues
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
        $validator = Validator::make($request->all(), [
            'medium' => 'required',
            'order_id' => 'required',
            'date_of_issue' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'main_category' => 'required',
            // 'sub_category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $issues = Issue::where('id', $id)->first();
        if($issues == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $issues->medium = $request->medium;
            $issues->order_id = $request->order_id;
            $issues->date_of_issue = $request->date_of_issue ;
            $issues->product_type = $request->product_type;
            $issues->category = $request->category ;
            $issues->main_category = $request->main_category;
            $issues->sub_category = $request->sub_category ;
            $issues->status = $request->status ;
            $issues->updated_by = auth('admin-api')->user()->id;
            $issues->update();
            return response()->json([
                'status' => true,
                'data' => $issues,
                'message' => 'Issue Updated Successfully!'
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
        $issues = Issue::where('id', $id)->first();
        if($issues == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $issues = Issue::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Issue Denied Successfully!'
            ]);
        }
    }
}
