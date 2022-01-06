<?php

namespace App\Http\Controllers\Api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulation;
use Illuminate\Support\Facades\Validator;
use App\Classes\FileUpload;

class RegulationController extends Controller
{
    protected $file;
    public function __construct(FileUpload $fileUpload)
    {
        $this->file = $fileUpload;
        $this->middleware('auth:admin-api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        // $data = Regulation::where('type', '0')->get();
        // foreach($data as $value){
        //     if($value->type == 0){
        //         $regulations = Regulation::with('issues', 'user')->where('type', '0')->orderBy('id', 'DESC')->get();
        //         return response()->json($regulations);
        //     }
        // }
        $regulations = Regulation::with('issues', 'queries', 'user')->orderBy('id', 'DESC')->get();
        return response()->json($regulations);
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
            'type' => 'required',
            'case_id' => 'required',
            'remarks' => 'required',
            'attachment' => 'required',
            'status' => 'required',
            'dateline' => 'required',
            'send_sms' => 'required',
            'regulation_type' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $fileLoad = $this->file->uploadFile($request, $fieldname = "attachment", $file = "", $folder = "assets/crm/files");

        $regulation = new Regulation();
        $regulation->type = $request->type;
        $regulation->case_id = $request->case_id;
        $regulation->remarks = $request->remarks;
        $regulation->attachment = $fileLoad;
        $regulation->status = $request->status;
        $regulation->dateline = $request->dateline;
        $regulation->send_sms = $request->send_sms;
        $regulation->regulation_type = $request->regulation_type;
        $regulation->created_by = auth('admin-api')->user()->id;
        $regulation->save();
        return response()->json([
            'status' => true,
            'data' => $regulation,
            'message' => 'Regulation stored Successfully!'
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
        $regulation = Regulation::where('id', $id)->first();
        if($regulation == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json(
                $regulation
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
            'type' => 'required',
            'case_id' => 'required',
            'remarks' => 'required',
            'attachment' => 'required',
            'status' => 'required',
            'dateline' => 'required',
            'send_sms' => 'required',
            'regulation_type' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['errors'] = $validator->errors();
            return response()->json($data, 422);
        }

        $regulation = Regulation::where('id', $id)->first();
        if($regulation == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $regulation->type = $request->type;
            $regulation->case_id = $request->case_id;
            $regulation->remarks = $request->remarks;
            $regulation->attachment = $request->attachment;
            $regulation->status = $request->status;
            $regulation->dateline = $request->dateline;
            $regulation->send_sms = $request->send_sms;
            $regulation->regulation_type = $request->regulation_type;
            $regulation->updated_by = auth('admin-api')->user()->id;
            $regulation->update();
            return response()->json([
                'status' => true,
                'data' => $regulation,
                'message' => 'Regulation Updated Successfully!'
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
        $regulation = Regulation::where('id', $id)->first();
        if($regulation == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $regulation = Regulation::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Regulation Denied Successfully!'
            ]);
        }
    }
}
