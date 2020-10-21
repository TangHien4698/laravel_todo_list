<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Task !</title>
    <style>
        .modal-content
        {
            display: none;
        }
    </style>
</head>
<body>
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
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="js/sweetalert2.min.css">
<script src="js/sweetalert2.min.js"></script>
</body>
<script>
    $( ".test" ).click(function() {
        $(".modal-content").css({"display": "block", "z-index": "5","top":"0px","width":"70%","position":"fixed"});
    });
    $( ".close" ).click(function() {
        $(".modal-content").css({"display": "none"});
    });
    $(document).ready(function() {
        // delete
        $(".delete").click(function () {
            var task_id = $(this).data('id');
            var task_name = $(this).data('name');
            if (confirm("Are You sure want to delete !" + task_name)) {
                $.ajax({
                    type: 'POST',
                    url: '{{url('ajax/delete_task')}}',
                    data:
                        {
                            "_token": "{{ csrf_token() }}",
                            task_id: task_id,
                        },
                    success: function (data) {
                        if (data) {
                            Swal.fire({
                                icon: 'success',
                                text: 'Xóa category thành công!',
                            })
                            window.location.href = "{{route('task')}}";
                        }
                    },
                });
            }
        });
        // edit
        $(".edit").click(function () {
            var user_id = $(this).data('name');
            if (confirm("Are You sure want to delete !" + user_name)) {
                $.ajax({
                    type: 'POST',
                    url: '{{url('ajax/delete_user')}}',
                    data:
                        {
                            "_token": "{{ csrf_token() }}",
                            user_name: user_name,
                        },
                    success: function (data) {
                        if (data) {
                            Swal.fire({
                                icon: 'success',
                                text: 'Xóa user  thành công!',
                            })
                            window.location.href = "{{route('homeuser_router')}}";
                        }
                    },
                });
            }
        });
    });
</script>
</html>
