<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $row["img_product"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2><?php echo $row["price_product"] ?> đ</h2>
                    <h5 class="card-title"><?php echo $row["name_product"] ?></h5>
                    <p class="card-text"><?php echo $row["des_product"] ?></p>
                    <a href="/KhoaLuan/Category/<?php echo $row["brand_product"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</body>

</html>