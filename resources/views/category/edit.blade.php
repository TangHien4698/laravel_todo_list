@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <h1>EDIT CATEGORY</h1>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INFOR CATEGORY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('treat_dataedit_category')}}">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="id" value="{{$infor_category["id"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name User</label>
                        <input type="text" class="form-control" name="name" value="{{$infor_category["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit"  class="btn btn-primary ">Edit Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

