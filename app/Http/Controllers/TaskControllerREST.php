<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Models\TasksModel;
use Illuminate\Http\Request;

class TaskControllerREST extends Controller
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TasksModel $tasks, string $id)
    {
        $title = 'Edit Task';
        $task = $tasks->find($id);
        return view('tasks.edit', ['pageTitle' => $title, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TasksModel $tasks, UpdateTasksRequest $request, string $id)
    {
        $validate = $request->validated();
        $task = $tasks->find($id);
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
    public function destroy(TasksModel $tasks, string $id)
    {
        $task = $tasks->find($id);
        $task->delete();

        return redirect('tasks');
    }
}
