@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">

    <form action = "{{route('task.update' ,$task->id)}}" method="post">
 
    @csrf


    <div class="form-group">
        <label for="title"> Enter your task here</label>

    <input type="text"  class = "form-control" name="title"  id="{{$task->id}}" value="{{$task->title}}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary"> update </button>
    </div>
</form>
    </div>
</div>




@endsection

