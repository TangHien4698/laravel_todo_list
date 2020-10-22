@extends('layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="css/index_task.css">
@endsection()
@section('content')
<div class="container">
    <div class="row">
        <h1>LIST Task</h1>
        <div class="col-md-12">
            <table class="table table-striped w-auto">
                <thead>
                <tr>
                    <th style="width:10%">id</th>
                    <th style="width:20%">Name Task</th>
                    <th style="width:20%">Name User</th>
                    <th style="width:20%">Name Category</th>
                    <th style="width:30%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr class="table-info">
                        <th style="width:30%">{{$task["id"]}}</th>
                        <td style="width:40%">{{$task["name"]}}</td>
                        <td style="width:40%">{{$task->user->name}}</td>
                        <td style="width:40%">{{$task->category->name}}</td>
                        <td style="width:20%">
                            <form method="POST" action="{{url('edittask')}}">
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" name="id" value="{{$task["id"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                                <button type="submit"  class="btn btn-primary "> <i class="fa fa-pencil" aria-hidden="true" ></i></button>
                            </form>
                            <i class="fa fa-trash delete" aria-hidden="true" data-id="{{$task["id"]}}" data-name="{{$task["name"]}}"></i>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="modal-content-task">
                <div class="modal-header">
                    <h5 class="modal-title">ADD TASK</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('addtask')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Task</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name Task">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name User</label>
                            <select name="user_id" class="form-control">
                                @foreach($users as $user)
                                <option value="{{$user["id"]}}">{{$user["name"]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categorys as $category)
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
@section('footer')
    <script src="js/index_task.js"></script>
@endsection
