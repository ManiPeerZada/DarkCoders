$(document).ready(function () {
    //--------------Edit Uom
    $(".edit_plan").on("click", function () {
        let id = $(this).attr("data-id");
        let name = $("#p_name_" + id).text();
        let price = $('#p_price_' + id).text();
        let desc = $('#p_desc_' + id).text();
        $("#e_id").val(id);
        $("#e_name").val(name);
        $('#e_price').val(price);
        $('#e_description').val(desc);
    });
//Delete Pricing Plan
    $(".delete_plan").on("click", function () {
        swal({
            title: "Warning",
            icon: "warning",
            text: "Are you Sure to Delete this ?",
            buttons: true,
            dangerMode: true,
        }).then((ok) => {
            if (ok) {
                let id = $(this).attr("data-id");
                let url = "/delete_pricing";
                header = "";
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "delete",
                    url: url,
                    data: {
                        id: id,
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
