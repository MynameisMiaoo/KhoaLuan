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
                    <img src=<?php echo $row["img_product"] ?> class="rounded float-end" alt="anh san pham" id="img_detail">
                </div>
                <div class="col-5">
                    <h1><?php echo $row["name_product"] ?></h1>
                    <h3><?php echo $row["price_product"] ?></h3>
                    <div class="box">size</div>
                    <div class="box-color">color</div>
                    <div>
                        <button>-</button>
                        <input type="text">
                        <button>+</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="" role="button">Mua Ngay</a>
                        <form action="/KhoaLuan/Cart" method="post">
                            <input type="hidden" name= "id_product" value="<?php echo $row['id_product'];?>">
                            <input type="hidden" name= "cate_id" value="<?php echo $row['cate_id'];?>">
                            <input type="hidden" name= "img_product" value="<?php echo $row['img_product'];?>">
                            <input type="hidden" name= "des_product" value="<?php echo $row['des_product'];?>">
                            <input type="hidden" name= "price_product" value="<?php echo $row['price_product'];?>">
                            <input type="hidden" name= "name_product" value="<?php echo $row['name_product'];?>">
                            <input type="hidden" name= "brand_product" value="<?php echo $row['brand_product'];?>">
                            <button type="submit">Them Vao Gio Hang</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        endwhile ?>
        <!-- san pham lien quan -->
        <div class="row">
            <hr class="myhr">
            <h1 class="mytitle">San Pham Tuong Tu</h1>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- binh luan -->
        <h1 class="mytitle">Binh Luan</h1>
        <div class="row" id="divcomment">
            <hr class="myhr">
            <div class="col-12">
                <div class="comment">
                    <div class="avt">
                        <img src="" alt="avt">
                    </div>
                    <div class="content">
                        <h1>xxxxxxxx</h1>
                    </div>
                </div>
                <div class="comment">
                    <div class="avt">
                        <img src="" alt="avt">
                    </div>
                    <div class="content">
                        <h1>xxxxxxxx</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>