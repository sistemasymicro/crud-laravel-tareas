<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Tarea creada');
    }

    /**
     * Display the specified resource.
     */
   public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));

    }

    public function update(TaskRequest $request, Task $task)
{
    $task->update($request->validated());

    return redirect()->route('tasks.index');
}

  public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index');
}
}
