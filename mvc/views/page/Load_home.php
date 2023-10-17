<?php while ($row = mysqli_fetch_assoc($data["data"])) : ?>
    <div class="col col-lg-3 col-sm-6 mycol">
        <div class="card">
            <img src="<?php echo $row["img_product"] ?>" class="card-img-top" alt="Anh san pham">
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