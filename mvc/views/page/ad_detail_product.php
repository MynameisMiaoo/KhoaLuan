<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="/KhoaLuan/public/css/ad_detail_product.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Nhập Tên sản phẩm" aria-label="Search" id="input_search">
                    <button class="btn btn-outline-success" type="button" id="btn_search">Tìm Kiếm</button>
                </div>
            </div>
        </div>
        <div class="row box">
            <div class="col-12" id="content">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            Load(1);
            $("#btn_search").click(function() {
                GetProduct($("#input_search").val());
            })
        })

        function GetProduct(id) {
            $.ajax({
                url: "/KhoaLuan/ajax/GetProduct",
                method: "POST",
                data: {
                    idsp: id
                },
                success: function(data) {
                    $("#content").html(data);
                }
            });
        }

        function Load(type) {
            $.ajax({
                url: "/KhoaLuan/ajax/LoadList",
                method: "POST",
                data: {
                    status: type
                },
                success: function(data) {
                    $("#content").html(data);
                }
            });
        }

        function handleDoubleClick(id) {
            $.ajax({
                url: "/KhoaLuan/ajax/GetDetailProduct",
                method: "POST",
                data: {
                    idsp: id
                },
                success: function(data) {
                    $("#content").html(data);
                }
            });

        }
    </script>
</body>

</html>