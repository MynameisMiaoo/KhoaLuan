<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link href="/KhoaLuan/public/css/search.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            if (mysqli_num_rows($data["data"]) == 0) :
            ?>
                <div class="col-12">
                    <div class="notify">
                        <b>Rất tiếc chúng tôi không tìm được sản phẩm nào phù hợp với từ khóa: "<?php echo $data['ct_search'] ?>"</b>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (mysqli_num_rows($data["data"]) != 0) :
            ?>
                <div class="col-12">
                    <div class="notify">
                        <b>Tìm thấy <?php echo mysqli_num_rows($data["data"])?> kết quả cho từ khóa: "<?php echo $data['ct_search'] ?>"</b>
                    </div>
                </div>
            <?php endif; ?>
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