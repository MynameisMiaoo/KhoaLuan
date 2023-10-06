<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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