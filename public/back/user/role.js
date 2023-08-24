$(document).ready(function () {
    //--------------Edit Uom
    $(".edit_user").on("click", function () {
        let id = $(this).attr("data-id");
        let role = $("#r_role_" + id).text();
        $("#e_id").val(id);
        $("#e_role").val(role);
    });
    //-------------Update Uom
    $("#upd_role").on("click", function () {
        let id = $("#e_id").val();
        let e_role = $("#e_role").val();
        let url = "/update_role";
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
                role: e_role,
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
    //-----------------Check Boxes For Permissing Assigning-----
    let pricing_check = $("#pricing_check");
    $(pricing_check).on("click", function () {
        if (pricing_check.is(":checked")) {
            $(this).val("1");
        } else {
            $(this).val("0");
        }
    });
    let files_check = $("#files_check");
    $(files_check).on("click", function () {
        if (files_check.is(":checked")) {
            $(this).val("1");
        } else {
            $(this).val("0");
        }
    });

    //------------Assign Role
    $("#assign_role").on("click", function () {
        let user = $(".user").val();
        let pricing = $('#pricing_check').val();
        let mfiles = $('#files_check').val();
        let url = "/save_assign_role";
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
                headers: header,
                user: user,
                pricing: pricing,
                mfiles: mfiles,
            },
            success: function (data) {
                if (data == "1") {
                    swal({
                        title: "Success",
                        icon: "success",
                        text: "Roles Assign Successfully",
                        button: "Ok",
                    });
                    location.reload();
                } else if (data === "u") {
                    swal({
                        title: "Success",
                        icon: "success",
                        text: "Roles Updated Successfully",
                        button: "Ok",
                    }).then((ok) => {
                        if (ok) {
                            location.reload();
                        }
                    });
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
});
