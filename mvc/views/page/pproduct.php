<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    <div class="option">
        <div class="sort-options">
            <label for="sort-select">Sắp xếp theo:</label>
            <select id="sort-select">
                <option value="asc">Giá tăng dần</option>
                <option value="desc">Giá giảm dần</option>
            </select>
            <label for="sort-select">Khoang Gia: </label>
            <input type="number" placeholder="Min Price">
            <input type="number" placeholder="Max Price">
            <button type="submit">Lọc</button>
        </div>
    </div>
    <?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
        <div class="card" style="width: 18rem;">
            <img src=<?php echo $row["img_product"] ?> class="card-img-top" alt="anh mau">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["name_product"] ?></h5>
                <p class="card-text"><?php echo $row["des_product"] ?></p>
                <a href="/KhoaLuan/Category/<?php echo $row["brand_product"] ?>_detail/<?php echo $row["id_product"] ?>" class="btn btn-primary">Chi Tiết</a>
            </div>
        </div>
    <?php
    endwhile
    ?>
        <?php
    if (mysqli_num_rows($data["data"]) == 0) {
        echo "<h1>Không có sản phẩm!</h1>";
    }
    ?>
</body>

</html>