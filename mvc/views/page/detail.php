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
                    <div class="box">size</div>
                    <div class="box-color">color</div>
                    <form action="/KhoaLuan/Cart" method="post">
                        <div>
                            <button id="btndec" type="button">-</button>
                            <input id="myip" type="text" value="1" name="count">
                            <button id="btnadd" type="button">+</button>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="" role="button">Mua Ngay</a>
                            <input type="hidden" name="id_product" value="<?php echo $row['id_product']; ?>">
                            <input type="hidden" name="cate_id" value="<?php echo $row['cate_id']; ?>">
                            <input type="hidden" name="img_product" value="<?php echo $row['img_product']; ?>">
                            <input type="hidden" name="des_product" value="<?php echo $row['des_product']; ?>">
                            <input type="hidden" name="price_product" value="<?php echo $row['price_product']; ?>">
                            <input type="hidden" name="name_product" value="<?php echo $row['name_product']; ?>">
                            <input type="hidden" name="brand_product" value="<?php echo $row['brand_product']; ?>">
                            <button type="submit">Them Vao Gio Hang</button>
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
        <iframe src="/KhoaLuan/binhluan/Check/<?php echo $data['idproduct']?>" frameborder="0" style="height: 100vh; width: 100%;"></iframe>
        </div>
    </div>
    <script>
        var btn = document.getElementById('btn_dang');
        var myform = document.getElementById('myform');
        var add = document.getElementById('btnadd');
        var dec = document.getElementById('btndec');
        var ip = document.getElementById('myip');
        add.addEventListener('click', function() {
            var count = parseInt(ip.value);
            ip.value = count + 1
        });
        dec.addEventListener('click', function() {
            var count = parseInt(ip.value);
            ip.value = count - 1
        });
        btn.addEventListener('click', function() {
            myform.submit();
        });
    </script>
</body>

</html>