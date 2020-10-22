@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <h1>EDIT USER</h1>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD STUDENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('treat_dataedit')}}">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="id" value="{{$infor_user["id"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name User</label>
                        <input type="text" class="form-control" name="name" value="{{$infor_user["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email User</label>
                        <input type="email" class="form-control" name="email" value="{{$infor_user["email"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit"  class="btn btn-primary ">Edit Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

