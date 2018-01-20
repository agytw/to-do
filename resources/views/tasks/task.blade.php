@extends('layouts.master')
@section('title')
    To-Do List
@endsection
@section('content')
    @foreach ($tasks as $task)
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
                <a href="/tasks/{{ $task->id }}">
                    <h4 class="card-title">{{ $task->title }}</h4>
                </a>
                <h6 class="card-subtitle mb-2 text-muted">Deadline: {{ $task->deadline }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Priority: {{ $task->priority }}</h6>
                <p class="card-text">{{ $task->detail }}</p>
                <a href="#" class="btn btn-danger card-link" onclick="event.preventDefault();
                         document.getElementById('delete{{ $task->id }}').submit();">Delete</a>
                <form id='delete{{ $task->id }}' action="tasks_delete" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="text" name="id" value="{{ $task->id }}"></input>
                </form>
                @if ($task->finished == 0)
                <a href="#" class="card-link btn btn-info" onclick="event.preventDefault();
                         document.getElementById('finish{{ $task->id }}').submit();">Mark as Finished</a>
                <form id='finish{{ $task->id }}' action="tasks_finish" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="text" name="id" value="{{ $task->id }}"></input>
                </form>
                @endif
            </div>
        </div>
    @endforeach
@endsection
