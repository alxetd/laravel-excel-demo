<?php

namespace App\Http\Controllers;

use App\Imports\FileImport;
use App\Models\Client;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $users = User::all();
        $roles = Role::all();
        $projects = Project::all();
        $clients = Client::all();
        $tasks = Task::all();

        return view('home',
            [
                'users' => $users,
                'roles' => $roles,
                'projects' => $projects,
                'tasks' => $tasks,
                'clients' => $clients
            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function import(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        Excel::import(new FileImport,$request->file('file'));

        return back()->with('success', 'The file was imported');
    }
}
