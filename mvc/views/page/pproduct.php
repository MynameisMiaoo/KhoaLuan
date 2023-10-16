<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="/KhoaLuan/public/css/product.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <?php
        if (mysqli_num_rows($data["data"]) == 0) {
            echo "<h1>Không có sản phẩm!</h1>";
        } else {
        ?>
            <div class="row">
                <div class="option">
                    <div class="sort-options">
                        <label for="sort-select">Sắp xếp theo:</label>
                        <form action="" method="get">
                            <select id="sort-select" name="sort_price">
                                <option value="" selected>Giá</option>
                                <option value="ASC">Giá tăng dần</option>
                                <option value="DESC">Giá giảm dần</option>
                            </select>
                            <label for="sort-select">Khoang Gia: </label>
                            <input type="number" placeholder="Min Price" name="minprice">
                            <input type="number" placeholder="Max Price" name="maxprice">
                            <button type="submit">Lọc</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="card-img-top" alt="anh mau">
                    <div class="card-body">
                        <h2><?php echo $row["price_product"] ?> đ</h2>
                        <h5 class="card-title"><?php echo $row["name_product"] ?></h5>
                        <p class="card-text"><?php echo $row["des_product"] ?></p>
                        <a href="/KhoaLuan/category/<?php echo $row["brand"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
                    </div>
                </div>
            <?php
            endwhile
            ?>
        </div>
    </div>
</body>

</html>