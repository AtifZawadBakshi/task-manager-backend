<?php

namespace App\Http\Controllers\Api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Query;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        $queries = Query::orderBy('id', 'DESC')->paginate(10);
        return response()->json($queries);
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
            'title' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $queries = new Query();
        $queries->title = $request->title;
        $queries->contact_person = $request->contact_person ;
        $queries->contact_number = $request->contact_number;
        $queries->description = $request->description ;
        $queries->created_by = auth('admin-api')->user()->id;
        $queries->save();
        return response()->json([
            'status' => true,
            'data' => $queries,
            'message' => 'Query stored Successfully!'
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
        $queries = Query::where('id', $id)->first();
        if($queries == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json(
                $queries
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
            'title' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $queries = Query::where('id', $id)->first();
        if($queries == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $queries->title = $request->title;
            $queries->contact_person = $request->contact_person ;
            $queries->contact_number = $request->contact_number;
            $queries->description = $request->description ;
            $queries->updated_by = auth('admin-api')->user()->id;
            $queries->update();
            return response()->json([
                'status' => true,
                'data' => $queries,
                'message' => 'Query Updated Successfully!'
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
        $queries = Query::where('id', $id)->first();
        if($queries == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $queries = Query::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Issue Denied Successfully!'
            ]);
        }
    }
}
