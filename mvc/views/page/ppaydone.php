<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đặt hàng</title>
    <link href="/KhoaLuan/public/css/paydone.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <?php if (sizeof($data['data']) == 0) : ?>
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                    <div>
                        <div style="margin-top: 20px;">
                            <b style="font-size: 20px;">Bạn chưa đặt đơn hàng nào!</b>
                        </div>
                        <div style="margin-top: 20px; display: flex; justify-content: center;">
                            <a href="/KhoaLuan/home" class="btn btn-warning">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row" style="min-height: 80vh;">
            <div class="col-2" style="background-color:transparent;">
                <div class="nav flex-column">
                    <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                        <div class="madh" id="iddh" data-dataid="<?php echo $data["data"][$i][0] ?>">
                            <b>Mã đơn hàng: <?php echo $data['data'][$i][0] ?></b>
                            <b>Trạng thái: <?php echo $data["data"][$i][2] ?></b>
                        </div>
                    <?php
                    endfor;
                    ?>
                </div>
            </div>
            <div class="col-10">
                <div class="row"></div>
                <div id="content">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var divElements = document.getElementsByClassName("madh");
            for (var i = 0; i < divElements.length; i++) {
                divElements[i].addEventListener("click", function() {
                    var dataId = this.getAttribute("data-dataid");
                    $.ajax({
                        url: "/KhoaLuan/ajax/History",
                        method: "POST",
                        data: {
                            id: dataId
                        },
                        success: function(data) {
                            $("#content").html(data);
                        }
                    });

                });
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            var divs = document.querySelectorAll(".madh");

            // Hàm xử lý sự kiện click cho các div
            function handleClick() {
                // Xóa lớp 'selected' khỏi tất cả các div
                divs.forEach(function(div) {
                    div.classList.remove("selected");
                });

                // Thêm lớp 'selected' vào div được nhấp vào
                this.classList.add("selected");
            }

            // Gán sự kiện click cho các div
            divs.forEach(function(div) {
                div.addEventListener("click", handleClick);
            });
        });
    </script>
</body>

</html>