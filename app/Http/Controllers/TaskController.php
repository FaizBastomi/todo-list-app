<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Models\TasksModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tasks List';
        $tasks = TasksModel::all();
        return view('tasks.index', ['tasks' => $tasks, 'pageTitle' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create', ['pageTitle' => 'Create Task']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request)
    {
        $validate = $request->validated();
        $tasks = new TasksModel;
        $tasks->name = $request->taskname;
        $tasks->detail = $request->taskdetail;
        $tasks->due_date = $request->taskduedate;
        $tasks->status = $request->taskprogress;
        $tasks->save();

        return redirect('tasks');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Task';
        $task = TasksModel::find($id);
        return view('tasks.edit', ['pageTitle' => $title, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, string $id)
    {
        $validate = $request->validated();
        $task = TasksModel::find($id);
        $task->name = $request->taskname;
        $task->detail = $request->taskdetail;
        $task->due_date = $request->taskduedate;
        $task->status = $request->taskprogress;
        $task->save();

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = TasksModel::find($id);
        $task->delete();

        return redirect('tasks');
    }
}
