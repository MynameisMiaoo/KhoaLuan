<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            justify-content: center;
            justify-items: center;
        }

        .divtb {
            display: flex;
            justify-content: center;
        }

        img {
            width: 20%;
            height: auto;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="divtb">
        <table>
            <tr>
                <td>STT</td>
                <td>Tên</td>
                <!-- <td>Id</td> -->
                <td>Giá</td>
                <td>Ảnh</td>
                <!-- <td>Mo Ta</td> -->
                <td>Thương Hiệu</td>
                <td>Số Lượng</td>
                <td>Size</td>
                <td>Màu</td>
            </tr>
            <tbody id="cart_content">

            </tbody>
        </table>
    </div>
    <div style="display: none;" id="tb">
        <h1>Gio hang trong</h1>
    </div>
    <div id="myDivv" class="hidden">
        <h4 id="total"></h4>
        <a href="/KhoaLuan/Pay" class="btn btn-primary" id="thanhtoan">Thanh Toan</a>
    </div>
    <div> <a href="/KhoaLuan/home" class="btn btn-primary">Tiep Tuc Mua</a></div>
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
                        $("#myDivv").show();
                        $("#total").text(data.total);
                    } else {
                        $("#myDivv").hide();
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