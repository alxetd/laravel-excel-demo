@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2>Tasks</h2>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 margin-tb">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 margin-tb">
                <a class="btn btn-primary" href="{{ route('tasks.create') }}" title="Add task"><i class="fas fa-backward ">Add task</i> </a>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('tasks.show', ['task' => $task->id]) }}">Show</a>
                                <a class="btn btn-sm btn-secondary" href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" title="delete">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $tasks->links() !!}
            </div>
        </div>
    </div>
@endsection
