function update_sts(id) {
    var sts = $("#sts_" + id + " span").html();
    var id = id;
    var url = '/update_site_sts/'+id;
    header = '';
                   $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id:id,
            sts:sts,
            headers:header,
        },
        success: function (data) {
            if(data != 'Active'){
                $("#sts_"+id).html('<span class="text-danger">'+data+'</span>');
            }else{
                $("#sts_"+id).html('<span class="text-success">'+data+'</span>');
            }

        }
    });
 }
$(document).ready(function () {
    //--------------Edit Uom
    $(".edit_user").on("click", function () {
        let id = $(this).attr("data-id");
        let name = $("#u_name_" + id).text();
        let email = $('#u_mail_' + id).text();
        let type = $('#u_type_'+id).text();
        let role = $('#u_role_'+id).text();
        $("#e_name").val(name);
        $("#e_id").val(id);
        $('#e_mail').val(email);
        $('.e_type').val(type);
        $('.e_role').val(role);
    });
    //-------------Update Uom
    $("#upd_user").on("click", function () {
        let id = $("#e_id").val();
        let e_name = $("#e_name").val();
        let e_mail = $('#e_mail').val();
        let e_type = $('.e_type').val();
        let e_role = $('.e_role').val();
        let e_pass = $('#e_password').val();
        let url = "/update_user";
        header = "";
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            url: url,
            data: {
                e_id: id,
                name: e_name,
                email: e_mail,
                type:e_type,
                role:e_role,
                password:e_pass,
                headers: header,
            },
            success: function (data) {
                if (data == 1) {
                    swal({
                        title: "Success",
                        icon: "success",
                        text: "Data Updated Successfully",
                        button: "Ok",
                    });
                    location.reload();
                } else {
                    swal({
                        title: "Alert",
                        icon: "warning",
                        text: "Something Went Wrong",
                        button: "Ok",
                    }).then((ok) => {
                        if (ok) {
                            location.reload();
                        }
                    });
                }
            },
        });
    });
    //-----------Delete Uom
    $(".del_uom").on("click", function () {
        swal({
            title: "Warning",
            icon: "warning",
            text: "Are you Sure to Delete this ?",
            buttons: true,
            dangerMode: true,
        }).then((ok) => {
            if (ok) {
                let id = $(this).attr("data-id");
                let url = "/delete_uom";
                header = "";
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        e_id: id,
                        headers: header,
                    },
                    success: function (data) {
                        if (data == 1) {
                            swal({
                                title: "Success",
                                icon: "success",
                                text: "Data Deleted Successfully",
                                button: "Ok",
                            });
                            location.reload();
                        }
                    },
                });
            }
        });
    });
});
