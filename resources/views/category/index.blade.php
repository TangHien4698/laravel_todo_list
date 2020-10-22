@extends('layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index_cat.css') }}">
@endsection()
@section('content')
<div class="container">
    <div class="row">
        <h1>LIST CATEGORY</h1>
        <div class="col-md-12">
            <table class="table table-striped w-auto">
                <thead>
                <tr>
                    <th style="width:30%">id</th>
                    <th style="width:40%">Name</th>
                    <th style="width:20%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($list_category as $category)
                    <tr class="table-info">
                        <th style="width:30%">{{$category["id"]}}</th>
                        <td style="width:40%">{{$category["name"]}}</td>
                        <td style="width:20%">
                            <form method="POST" action="{{url('editcategory')}}">
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" name="name" value="{{$category["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                                <button type="submit"  class="btn btn-primary "> <i class="fa fa-pencil" aria-hidden="true" ></i></button>
                            </form>
                            <i class="fa fa-trash delete" aria-hidden="true" data-id="{{$category["id"]}}" data-name="{{$category["name"]}}"></i>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button class="test">Add Category</button>
        <a class="user" href="{{url("/")}}">User</a>
        <a class="task" href="{{url("task")}}">Task</a>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD CATEGORY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('addcategory')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Category</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit"  class="btn btn-primary ">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script src="js/category/index_category.js"></script>
@endsection

