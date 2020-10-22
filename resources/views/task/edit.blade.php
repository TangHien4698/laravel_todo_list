@extends('layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="css/index_task.css">
@endsection()
@section('content')
<div class="container">
    <div class="row">
        <h1>EDIT Task</h1>
        <div class="col-md-12">
            <div class="modal-content-task">
                <div class="modal-header">
                    <h5 class="modal-title">ADD TASK</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('treat_dataedit_task')}}">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="id" value="{{$task["id"]}}" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Task</label>
                            <input type="text" class="form-control" name="name" value="{{$task["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name Task">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name User</label>
                            <select name="user_id" class="form-control" value="{{$task->user->name}}">
                                <option value="{{$task->user->id}}">{{$task->user->name}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user["id"]}}">{{$user["name"]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Category</label>
                            <select name="category_id" class="form-control" value="{{$task->category->name}}">
                                <option value="{{$task->category->id}}">{{$task->category->name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category["id"]}}">{{$category["name"]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"  class="btn btn-primary ">Add Category</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

