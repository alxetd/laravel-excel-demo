@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Task #{{ $task->id }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $task->name }}" placeholder="Enter task name" disabled>
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="users">Assigned users</label>
                    <select id="users" name="users[]" multiple class="form-control" disabled>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $task->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('tasks.index') }}" title="Go back"><i class="fas fa-backward ">Go Back</i> </a>
                    <a class="btn btn-primary" href="{{ route('tasks.edit', ['task' => $task->id ]) }}" title="Go back">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
