@extends('layouts.master')
@section('title')
    Create A New Task
@endsection
@section('content')

@include('layouts.errors')

<form action="/create" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Things To-Do" name="title" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="deadline" name="deadline">
        </div>
    </div>
    <div class="form-group row">
        <label for="priority" class="col-sm-2 col-form-label">Priority</label>
        <div class="col-sm-10">
        <select class="form-control" id="priority" name="priority">
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
            <textarea class="form-control" id="detail" placeholder="Details" name="detail"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
@endsection
