<?php

namespace App\Http\Controllers\Api\meet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sub_task;
use App\Models\task;

use function PHPUnit\Framework\returnSelf;

class SubTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $task = sub_task::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new sub_task;
        $task->title = $request->title;
        $task->task_id = $request->task_id;
        $task->time = $request->time;
        $task->status = $request->status;
        $task->save();
        return response()->json(['task'=>$task, 'success'=>200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subTask = sub_task::where('id', $id)->first();
        return response()->json(['subTask'=>$subTask, 'success'=>200]);
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
        $task = sub_task::where('id', $id)->first();
        $task->title = $request->title;
        $task->task_id = $request->task_id;
        $task->time = $request->time;
        $task->status = $request->status;
        $task->update();
        return response()->json(['task'=>$task, 'success'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_task = sub_task::where('id', $id)->first();
        $sub_task->delete();
        return response()->json(['SubTask'=>$sub_task, 'success'=>200]);
    }

    public function status($id, Request $request)
    {
        $data1 = false;
        $data0 = false;
        $sub_task = sub_task::where('id', $id)->first();
        $sub_task->status = $request->status;
        $sub_task->update();
        $s_task = sub_task::where('task_id', $sub_task->task_id)->get();
        foreach($s_task as $stask)
        {
            if($stask->status == true){
                $data1 = true;
            }else{
                $data0 = true;
            }

        }
        if($data1 == true && $data0 == false){
            $task = task::where('id', $stask->task_id)->first();
            $task->status = 'Done';
            $task->update();
        }elseif($data1 == true && $data0 == true){
            $task = task::where('id', $stask->task_id)->first();
            $task->status = 'In Progress';
            $task->update();
        }else{
            $task = taskeve::where('id', $stask->task_id)->first();
            $task->status = 'Not Started';
            $task->update();
        }
        return response()->json(['sub_task'=>$sub_task, 'task'=>$task, 'success'=>200]);
    }
}
