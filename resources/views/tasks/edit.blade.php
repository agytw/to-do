@extends('layouts.master')
@section('title')
    {{$task->title}}
@endsection
@section('content')
    @include('layouts.errors')
    <h1>{{$task->title}}</h1>
    <p>{{$task->detail}}</p>
    <div class="card mb-3">
        @if ($task->finished == 0)
            <div class="card-header">
                Unfinished
            </div>
        @else
            <div class="card-header">
                Finished
            </div>
        @endif
        <div class="card-body">

            <form action="/update" method="post">
                {{ csrf_field() }}
                <input hidden name="id" value="{{ $task->id }}"></input>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" placeholder="{{ $task->title }}" value="{{ $task->title }}" name="title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $task->deadline }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="priority" class="col-sm-2 col-form-label">Priority</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="priority" name="priority">
                        <option value="{{ $task->priority }}" selected hidden>{{ $task->priority }}</option>
                        <option  value="0">0</option>
                        <option  value="1">1</option>
                        <option  value="2">2</option>
                        <option  value="3">3</option>
                        <option  value="4">4</option>
                        <option  value="5">5</option>
                    </select>
                </div>
                </div>
                <div class="form-group row">
                    <label for="detail" class="col-sm-2 col-form-label">Details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detail" name="detail">{{ $task->detail }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-primary" type="submit">Update To-Do List</button>
                </div>
            </form>
        </div>
    </div>
@endsection
