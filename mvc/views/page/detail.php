<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Khoaluan/public/css/detail.css" rel="stylesheet">
    <title>details</title>
</head>

<body>
    <div class="container-fluid">
        <!-- chi tiet  -->
        <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
            <div class="row">
                <div class="col-7">
                    <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="rounded float-end" alt="anh san pham" id="img_detail">
                </div>
                <div class="col-5">
                    <h1><?php echo $row["name_product"] ?></h1>
                    <h3><?php echo $row["price_product"] ?></h3>
                    <div class="tt" id="div_ajax">
                        <div class="box">
                            <?php for ($i = 0; $i < sizeof($data["size"]); $i++) : ?>
                                <div class="size" data-size=" <?php echo $data["size"][$i] ?> "><?php echo $data["size"][$i] ?></div>
                            <?php
                            endfor;
                            ?>
                        </div>
                        <div class="box-color">
                            <?php for ($i = 0; $i < sizeof($data["color"]); $i++) : ?>
                                <div class="color" data-color="<?php echo $data["color"][$i] ?>"><?php echo $data["color"][$i] ?></div>
                            <?php
                            endfor;
                            ?>
                        </div>
                        <div id="count_pr" style="display: none;">
                            <h5 id="h6count"></h5>
                        </div>
                    </div>
                    <form action="/KhoaLuan/Cart" method="post" id="myform">
                        <div>
                            <button id="btndec" type="button">-</button>
                            <input id="myip" type="number" value="1" name="count" max="" min=1 autocomplete="off" required style="width:100px; text-align: center;">
                            <button id="btnadd" type="button">+</button>
                        </div>
                        <div>
                            <!-- <a class="btn btn-primary" href="" role="button">Mua Ngay</a> -->
                            <input type="hidden" name="id_product" id="idpr" value="<?php echo $row['id_product']; ?>">
                            <input type="hidden" name="cate_id" id="catepr" value="<?php echo $row['cate_id']; ?>">
                            <input type="hidden" name="img_product" id="img_product" value="<?php echo $row['img_product']; ?>">
                            <input type="hidden" name="des_product" id="despr" value="<?php echo $row['des_product']; ?>">
                            <input type="hidden" name="price_product" id="pricepr" value="<?php echo $row['price_product']; ?>">
                            <input type="hidden" name="name_product" id="namepr" value="<?php echo $row['name_product']; ?>">
                            <input type="hidden" name="brand_product" id="brandpr" value="<?php echo $row['brand_product']; ?>">
                            <input type="hidden" name="size_product" id="size_product" value="">
                            <input type="hidden" name="color_product" id="color_product" value="">
                            <button type="button" style="display: none;" id="btn_buy">Thêm Vào Giỏ Hàng</button>
                    </form>
                </div>
            </div>
        <?php
        endwhile ?>
        <!-- san pham lien quan -->
        <div class="row">
            <hr class="myhr">
            <h1 class="mytitle">San Pham Tuong Tu</h1>
            <?php while ($row = mysqli_fetch_assoc($data['data2'])) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2><?php echo $row["price_product"] ?> đ</h2>
                            <h5 class="card-title"><?php echo $row["name_product"] ?></h5>
                            <p class="card-text"><?php echo $row["des_product"] ?></p>
                            <a href="/KhoaLuan/Category/<?php echo $row["brand_product"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
                        </div>
                    </div>
                </div>
            <?php
            endwhile
            ?>
        </div>
        <!-- binh luan -->
        <h1 class="mytitle">Binh Luan</h1>
        <div id="content">

        </div>
        <div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" data-dataid="<?php echo $data['idproduct'] ?>"></textarea>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<button type="button" class="btn btn-success" onclick="redirectToLogin()">Dang Nhap De Binh Luan</button>';
                } else {
                    echo '<button type="button" class="btn btn-success" name="btn_dang" id="btn_dang">Dang</button>';
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <script>
        var btn = document.getElementById('btn_buy');
        var myform = document.getElementById('myform');
        var add = document.getElementById('btnadd');
        var dec = document.getElementById('btndec');
        var ip = document.getElementById('myip');
        var img = document.getElementById('img_detail');
        var img2 = document.getElementById('img_product');
        $("#btn_dang").click(function() {
            $.ajax({
                url: "/KhoaLuan/ajax/ADDCM",
                method: "POST",
                data: {
                    id: $("#floatingTextarea").data('dataid'),
                    content: $("#floatingTextarea").val()
                },
                success: function(data) {
                    $("#floatingTextarea").val("");
                    LoadCm();
                }
            });
        })

        function LoadCm() {
            $.ajax({
                url: "/KhoaLuan/ajax/CM",
                method: "POST",
                data: {
                    id: 1
                },
                success: function(data) {
                    $("#content").html(data);
                }
            });

        }

        $(document).ready(function() {
            var size = document.getElementById("size_product");
            var color = document.getElementById("color_product");
            var selectedSize = null;
            var selectedColor = null;
            LoadCm();
            $("#btn_buy").click(function() {
                event.preventDefault();
                var formdata = {
                    id_product: $("#idpr").val(),
                    cate_id: $("#catepr").val(),
                    img_product: $("#img_product").val(),
                    // img_product: $("#img_detail").src,
                    des_product: $("#despr").val(),
                    price_product: $("#pricepr").val(),
                    name_product: $("#namepr").val(),
                    brand_product: $("#brandpr").val(),
                    size_product: $("#size_product").val(),
                    color_product: $("#color_product").val(),
                    count: $("#myip").val()
                }
                $.ajax({
                    url: "/KhoaLuan/ajax/Cart",
                    method: "POST",
                    data: formdata,
                    success: function(data) {
                        window.location.href = "/KhoaLuan/Cart";
                    }
                });
            })
            $(".size").click(function() {
                $(".size").removeClass("selected");
                $(this).addClass("selected");
                selectedSize = $(this).data("size");
                size.value = selectedSize;
                sendAjaxRequest();
            });
            $(".color").click(function() {
                $(".color").removeClass("selected");
                $(this).addClass("selected");
                selectedColor = $(this).data("color");
                sendAjax();
                color.value = selectedColor;
                sendAjaxRequest();
            });

            function sendAjax() {
                $.ajax({
                    url: "/KhoaLuan/ajax/Img",
                    method: "POST",
                    data: {
                        color: selectedColor,
                        id: <?php echo $data['idproduct']; ?>
                    },
                    success: function(data) {
                        var result = JSON.parse(data);
                        img.src = "/KhoaLuan/" + result;
                        img2.value = img.src;
                    }
                });

            }

            function sendAjaxRequest() {
                if (selectedSize && selectedColor) {
                    $.ajax({
                        url: "/KhoaLuan/ajax/CountProduct",
                        method: "POST",
                        data: {
                            size: selectedSize,
                            color: selectedColor,
                            id: <?php echo $data['idproduct']; ?>
                        },
                        success: function(data) {
                            var result = JSON.parse(data);
                            $("#count_pr").css("display", "flex");
                            $("#h6count").text("Kho: " + result);
                            ip.max = parseInt(result);
                            $("#btn_buy").css("display", "flex");
                        }
                    });
                }
            }
        });
        add.addEventListener('click', function() {
            var count = parseInt(ip.value);
            ip.value = count + 1
        });
        dec.addEventListener('click', function() {
            var count = parseInt(ip.value);
            ip.value = count - 1
        });
    </script>
</body>

</html>