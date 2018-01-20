<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // User Limited
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show Tasks
    public function index()
    {
        $tasks = auth()->user()->tasks()
        ->orderBy('deadline','asc')
        ->orderBy('priority','desc')
        ->get();
        return view('tasks.task', compact('tasks'));
    }

    public function priority()
    {
        $tasks = auth()->user()->tasks()
        ->orderBy('priority','desc')
        ->orderBy('deadline','asc')
        ->get();
        return view('tasks.task', compact('tasks'));
    }

    // Create Tasks
    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'title' => 'bail|required|max:255',
            'priority' => 'bail|required|max:4',
            'deadline' => 'nullable|date',
        ]);
        auth()->user()->tasks()->create([
            'title' => request('title'),
            'deadline'=> request('deadline'),
            'priority' => request('priority'),
            'detail' => request('detail'),
            ]);
        return redirect('/');
    }

    // Make Changes to Tasks
    public function edit(tasks $tasks)
    {
        $task = $tasks;
        return view('tasks.edit', compact('task'));
    }

    public function update()
    {
        $this->validate(request(),[
            'title' => 'bail|required|max:255',
            'priority' => 'bail|required|max:4',
            'deadline' => 'nullable|date',
        ]);
        tasks::where('id', '=', request('id'))->update([
            'title' => request('title'),
            'deadline'=> request('deadline'),
            'priority' => request('priority'),
            'detail' => request('detail'),
            ]);
        return redirect('/');
    }

    // Delete Tasks
    public function destroy()
    {
        tasks::where('id', '=', request('id'))
        ->delete();

        return back();
    }

    // Mark Tasks as Finished
    public function finish()
    {
        tasks::where('id', '=', request('id'))
        ->update(['finished' => true]);

        return back();
    }
}
