<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/detail.css" rel="stylesheet">
    <title>Chi tiết</title>
</head>

<body>
    <div class="container">
        <!-- chi tiet  -->
        <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
            <div class="row">
                <div class="col col-lg-7 col-sm-12 divimg">
                    <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="rounded float-end" alt="anh san pham" id="img_detail" style="height: 222px; width: auto; ">
                </div>
                <div class="col col-lg-5 col-sm-12">
                    <div class="rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                    </div>
                    <div class="info">
                        <h3><?php echo strtoupper($row["name_product"]) ?></h3>
                        <h5><?php echo  $formattedAmount = number_format($row["price_product"], 0, ',', '.');  ?> đ</h5>
                    </div>
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
                            <span>Kho: </span>
                            <h5 id="h6count"></h5>
                        </div>
                    </div>
                    <div class="divcout" style="display: flex; align-items: center;">
                        <input class="form-control" id="myip" type="number" value="1" name="count" max="" min=1 autocomplete="off" required style="width:100px; text-align: center;" onchange="Check()">
                    </div>
                    <form action="/KhoaLuan/cart" method="post" id="myform">
                        <input type="hidden" name="id_product" id="idpr" value="<?php echo $row['id_product']; ?>">
                        <input type="hidden" name="cate_id" id="catepr" value="<?php echo $row['cate_id']; ?>">
                        <input type="hidden" name="img_product" id="img_product" value="<?php echo $row['img_product']; ?>">
                        <input type="hidden" name="des_product" id="despr" value="<?php echo $row['des_product']; ?>">
                        <input type="hidden" name="price_product" id="pricepr" value="<?php echo $row['price_product']; ?>">
                        <input type="hidden" name="name_product" id="namepr" value="<?php echo $row['name_product']; ?>">
                        <input type="hidden" name="brand_product" id="brandpr" value="<?php echo $row['brand']; ?>">
                        <input type="hidden" name="size_product" id="size_product" value="">
                        <input type="hidden" name="color_product" id="color_product" value="">
                        <button type="button" class="btn btn-warning" style="display: none; margin-top: 10px;" id="btn_buy">Thêm Vào Giỏ Hàng</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-section">
                        <span class="decorated-text">
                            <span class="decorator">★</span>
                            <b>MÔ TẢ SẢN PHẨM</b>
                            <span class="decorator">★</span>
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div style="display: flex; justify-content: center;">
                        <b>Thương Hiệu: <?php echo $row['brand'] ?></b>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <b>Thể Loại: <?php echo $row['cate_product'] ?></b> 
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <b><?php echo $row['des_product'] ?></b> 
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
        <!-- san pham lien quan -->
        <div class="product-section">
            <span class="decorated-text">
                <span class="decorator">★</span>
                <b>SẢN PHẨM TƯƠNG TỰ</b>
                <span class="decorator">★</span>
            </span>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data["data2"])) : ?>
                <div class="col col-lg-3 col-sm-6 mycol">
                    <div class="card">
                        <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="card-img-top" alt="Anh san pham">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo strtoupper($row["name_product"]) ?></h5>
                            <div class="rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                            <div class="price">
                                <span class="vnd"><?php echo $formattedAmount = number_format($row["price_product"], 0, ',', '.'); ?> đ</span>
                            </div>
                            <div class="detail">
                                <a href="/KhoaLuan/category/<?php echo $row["brand"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <!-- binh luan -->
        <div class="product-section">
            <span class="decorated-text">
                <span class="decorator">★</span>
                <b>BÌNH LUẬN</b>
                <span class="decorator">★</span>
            </span>
        </div>
        <div class="row">
            <div class="col">
                <div id="content">
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" data-dataid="<?php echo $data['idproduct'] ?>"></textarea>
                    <div class="itemcenter">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<button type="button" class="btn btn-success btncm" onclick="redirectToLogin()">Đăng nhập để bình luận</button>';
                        } else {
                            echo '<button type="button" class="btn btn-success btncm" name="btn_dang" id="btn_dang">Đăng</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var btn = document.getElementById('btn_buy');
        var myform = document.getElementById('myform');
        // var add = document.getElementById('btnadd');
        // var dec = document.getElementById('btndec');
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
                    id: $("#idpr").val()
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
                if (ip.value > 0 && ip.value <= parseInt($("#h6count").text())) {
                    $.ajax({
                        url: "/KhoaLuan/ajax/Cart",
                        method: "POST",
                        data: formdata,
                        success: function(data) {
                            window.location.href = "/KhoaLuan/cart";
                        }
                    });
                } else {
                    alert("Vui lòng nhập đúng số lượng");
                }
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
                            $("#h6count").text(result);
                            ip.max = parseInt(result);
                            // $("#btn_buy").css("display", "flex");
                            if ($("#h6count").text() != 0) {
                                $("#btn_buy").css("display", "flex");
                            } else {
                                $("#btn_buy").css("display", "none");
                            }
                            ip.value = 1;
                        }
                    });
                }
            }
        });
        // add.addEventListener('click', function() {
        //     var count = parseInt(ip.value);
        //     if (count < $("#h6count").text()) {
        //         ip.value = count + 1
        //     }
        // });
        // dec.addEventListener('click', function() {
        //     var count = parseInt(ip.value);
        //     if (count > 1) {
        //         ip.value = count - 1
        //     }
        // });
    </script>
</body>

</html>