<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Edit User!</title>
</head>
<body>
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
                        <input type="text" class="form-control" name="name_edit" value="{{$infor_user["name"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email User</label>
                        <input type="email" class="form-control" name="email_edit" value="{{$infor_user["email"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name student">
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
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="js/sweetalert2.min.css">
<script src="js/sweetalert2.min.js"></script>
</body>
</html>
