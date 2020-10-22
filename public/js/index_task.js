$(document).ready(function () {
    $(".test").click(function () {
        $(".modal-content").css({
            "display": "block",
            "z-index": "5",
            "top": "0px",
            "width": "70%",
            "position": "fixed"
        });
    });
    $(".close").click(function () {
        $(".modal-content").css({"display": "none"});
    });
    // delete
    $(".delete").click(function () {
        var task_id = $(this).data('id');
        var task_name = $(this).data('name');
        if (confirm("Are You sure want to delete !" + task_name)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'ajax/delete_task',
                data:
                    {
                        task_id: task_id,
                    },
                success: function (data) {
                    if (data.status) {
                        Swal.fire({
                            icon: 'success',
                            text: data.message,
                        })
                        window.location.href = "/task";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                        })
                    }
                },
                error: function (err) {
                    Swal.fire({
                        icon: 'error',
                        text: err.statusText,
                    })
                }
            });
        }
    });
});
