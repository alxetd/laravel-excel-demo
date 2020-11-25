<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $tasks = Task::paginate(10);
        return view('tasks.index', compact('tasks'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        $task = Task::create([
            'name' => $request->get('name')
        ]);

        $task->users()->sync($request->get('users'));
        $task->save();

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Task $task): Renderable
    {
        $users = User::all();

        return view('tasks.show', compact('task', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Task $task): Renderable
    {
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task->name = ($request->get('name'));
        $task->users()->sync($request->get('users'));
        $task->save();

        return redirect()->route('tasks.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task
     *
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
