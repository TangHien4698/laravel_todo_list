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
        var name = $(this).data('name');
        if (confirm("Are You sure want to delete !" + name)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'ajax/delete_category',
                data:
                    {
                        name: name,
                    },
                success: function (data) {
                    if (data.status) {
                        Swal.fire({
                            icon: 'success',
                            text: data.message,
                        })
                        window.location.href = "/category";
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
    // edit

});

