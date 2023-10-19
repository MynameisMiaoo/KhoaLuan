<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/cart.css" rel="stylesheet">
    <title>Giỏ Hàng</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="tbhead">
                        <tr>
                            <!-- <td>STT</td> -->
                            <td>Tên</td>
                            <td>Ảnh</td>
                            <td>Thương Hiệu</td>
                            <td>Số Lượng</td>
                            <td>Size</td>
                            <td>Màu</td>
                            <td>Giá</td>
                            <td>Xóa</td>
                        </tr>
                    </thead>
                    <tbody id="cart_content">

                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div style="display: none;" id="tb">
            <h1>Giỏ hàng trống</h1>
        </div> -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="/KhoaLuan/home" class="btn btn-warning btn_acc">Tiếp Tục Mua</a>
                <a href="/KhoaLuan/Pay" class="btn btn-warning btn_acc" id="thanhtoan">Thanh Toán</a>
            </div>
        </div>
    </div>
    <script>
        function Delete(element) {
            var dataid = element.getAttribute('data-dataid');
            $.ajax({
                url: "/KhoaLuan/ajax/DeleteCart",
                method: "POST",
                data: {
                    index: dataid
                },
                success: function(data) {
                    LoadCart();
                }
            });

        }

        function LoadCart() {
            $.ajax({
                url: "/KhoaLuan/ajax/LoadCart",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $("#cart_content").html(data.html);
                    var tem = data.cartCount;
                    if (tem > 0) {
                        $("#thanhtoan").show();
                    } else {
                        $("#thanhtoan").hide();
                    }
                }
            });
        }
        $(document).ready(function() {
            LoadCart();
        })
    </script>
</body>

</html>