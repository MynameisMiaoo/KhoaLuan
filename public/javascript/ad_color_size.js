$("#btn_add_color").click(function () {
    $.ajax({
        url: "/KhoaLuan/ajax/AddColor",
        method: "POST",
        data: {
            color: $("#input_color").val()
        },
        success: function (data) {
            location.reload();
        }
    });

})
$("#btn_add_size").click(function () {
    $.ajax({
        url: "/KhoaLuan/ajax/AddSize",
        method: "POST",
        data: {
            size: $("#input_size").val()
        },
        success: function (data) {
            location.reload();
        }
    });
})
