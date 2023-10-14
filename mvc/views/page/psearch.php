<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link href="/KhoaLuan/public/css/search.css" rel="stylesheet"> 
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (mysqli_num_rows($data["data"]) == 0) {
                echo '<h1>Không có sản phẩm: "' . $data['ct_search'] . '"</h1>';
            }
            ?>
            <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="/KhoaLuan/<?php echo $row["img_product"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2><?php echo $row["price_product"] ?> đ</h2>
                            <h5 class="card-title"><?php echo $row["name_product"] ?></h5>
                            <p class="card-text"><?php echo $row["des_product"] ?></p>
                            <a href="/KhoaLuan/category/<?php echo $row["brand_product"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
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