@extends('layout')
@section('header')
{{--    <link rel="stylesheet" type="text/css" href="css/index_user.css">--}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index_user.css') }}">
@endsection()
@section('content')
<div class="container">
    <div class="row">
        <h1>LIST USER</h1>
        <div class="col-md-12">
                <table class="table table-striped w-auto">
                    <thead>
                    <tr>
                        <th style="width:30%">id</th>
                        <th style="width:40%">Name</th>
                        <th style="width:40%">Email</th>
                        <th style="width:20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($listuser as $user)
                    <tr class="table-info">
                        <th style="width:30%">{{$user["id"]}}</th>
                        <td style="width:40%">{{$user["name"]}}</td>
                        <td style="width:40%">{{$user["email"]}}</td>
                        <td style="width:20%">
                            <form method="POST" action="{{url('edituser')}}">
                                {{ csrf_field() }}
                                    <input type="hidden" class="form-control" name="name_edit" value="{{$user["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                                <button type="submit"  class="btn btn-primary "> <i class="fa fa-pencil" aria-hidden="true" ></i></button>
                            </form>
                            <i class="fa fa-trash delete" data-test="hien" aria-hidden="true" data-id="{{$user["id"]}}" data-name="{{$user["name"]}}"></i>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        <button class="test">Add student</button>
        <a class="category" href="{{url("category")}}">Category</a>
        <a class="task" href="{{url("task")}}">Task</a>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD STUDENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('adduser')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name User</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email User</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pass word</label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit"  class="btn btn-primary ">Add student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script src="js/user/index_user.js"></script>
@endsection
