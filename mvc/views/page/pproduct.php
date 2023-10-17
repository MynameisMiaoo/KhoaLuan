<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="/KhoaLuan/public/css/product.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php
        if (mysqli_num_rows($data["data"]) == 0) {
            echo "<h1>Không có sản phẩm!</h1>";
        } else {
        ?>
            <div class="row" id="sort">
                <form action="" method="get">
                    <div class="col mysort">
                        <select class="form-select" id="sort-select" name="sort_price">
                            <option selected value="">Giá</option>
                            <option value="ASC">Giá tăng dần</option>
                            <option value="DESC">Giá giảm dần</option>
                        </select>
                        <input type="number" class="form-control" placeholder="Giá tối thiểu" name="minprice">
                        <input type="number" class="form-control" placeholder="Giá tối đa" name="maxprice">
                        <button type="submit" class="btn btn-success">Lọc</button>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
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
    </div>
</body>

</html>