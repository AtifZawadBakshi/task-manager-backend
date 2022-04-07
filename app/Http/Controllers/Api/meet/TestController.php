<?php

namespace App\Http\Controllers\Api\meet;

use App\Http\Controllers\Controller;
use App\Models\sub_task;
use Illuminate\Http\Request;
use App\Models\task;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $task = task::with('subtask')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // return response()->json(['task'=>$request->all(), 'success'=>200]);
        $task = new task;
        $task->title = $request->title;
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
        $task = Task::with('subtask')->where('id', $id)->first();
        return response()->json(['task'=>$task, 'success'=>200]);
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
        $task = task::where('id', $id)->first();
        $task->title = $request->title;
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
        $task = Task::where('id', $id)->first();
        $task->delete();
        return response()->json(['Task'=>$task, 'success'=>200]);
    }

    public function date(Request $request)
    {
        $task = task::with('subtask')->where('time', $request->date)->get();
        return response()->json(['data'=>$task, 'success' => 200]);
    }
}
