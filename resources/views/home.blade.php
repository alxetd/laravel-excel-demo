@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Import</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card bg-light mt-3">
                    <div class="card-body">
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control @error('first_name') is-invalid @enderror">
                            @error('file')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <br>
                            <button class="btn btn-primary">Import Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-lg-12 margin-tb">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#users" data-toggle="tab">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roles" data-toggle="tab">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients" data-toggle="tab">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects" data-toggle="tab">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tasks" data-toggle="tab">Tasks</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="users">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show" id="roles">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="projects">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="clients">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client->id }}</th>
                                    <td>{{ $client->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tasks">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->name }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
