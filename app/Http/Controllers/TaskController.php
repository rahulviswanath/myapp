<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
    /**
    *
    * @param  Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        return TaskResource::collection(Task::all());
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  Request $request
    * @param  Task $task
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Task $task)
    {
        $task->update($request->only(['description', 'status','type','next_action_date']));
        return new TaskResource($task);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $task = Task::create($request->only(['description', 'status','type','assigned_to','next_action_date']));
        return new TaskResource($task);
    }
    /**
    * Return the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  Task $task
    * @return \Illuminate\Http\Response
    */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}