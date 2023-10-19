<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ad_order.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col highlight" onclick="highlight(this)" data-dataid="1">Đơn hàng mới</div>
            <div class="col " onclick="highlight(this)" data-dataid="2">Đang giao hàng</div>
            <div class="col " onclick="highlight(this)" data-dataid="3">Đã Giao Hàng</div>
            <div class="col " onclick="highlight(this)" data-dataid="4">Đã Hủy</div>
        </div>
        <div class="row" style="margin-top: 50px; padding: 10px 30px; border: 2px black solid; border-radius: 10px; background-color: #f9f2f2; min-height: 30vh;">
            <div class="col-12" id="content2">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            CallAjax(1);
        })

        function Get(ma) {
            $.ajax({
                url: "/KhoaLuan/ajax/GetOrder",
                method: "POST",
                data: {
                    id_oder: ma
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }

        function highlight(element) {
            var cols = document.getElementsByClassName("col");
            for (var i = 0; i < cols.length; i++) {
                cols[i].classList.remove("highlight");
            }
            element.classList.add("highlight");
            CallAjax(element.getAttribute("data-dataid"));
        }

        function CallAjax(data) {
            $.ajax({
                url: "/KhoaLuan/ajax/Order",
                method: "POST",
                data: {
                    status: data
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }
    </script>
</body>

</html>