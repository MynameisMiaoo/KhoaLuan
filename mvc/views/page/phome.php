<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Home</title>
    <link href="/KhoaLuan/public/css/home.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php for ($i = 0; $i < sizeof($data['ads']); $i++) : ?>
                    <?php if ($i == 0) : ?>
                        <div class="carousel-item active">
                            <img src="/KhoaLuan/<?php echo $data['ads'][$i]['img_ads'] ?>" class="d-block imgcarou" alt="ads">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>MinAShop</h5>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="carousel-item">
                            <img src="/KhoaLuan/<?php echo $data['ads'][$i]['img_ads'] ?>" class="d-block imgcarou" alt="ads">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>MinAShop</h5>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div> <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sau</span>
            </button>
        </div>
        <div class="product-section">
            <span class="decorated-text">
                <span class="decorator">★</span>
                <b>SẢN PHẨM NỔI BẬT</b>
                <span class="decorator">★</span>
            </span>
        </div>
        <div class="container">
            <div class="row" id="ds">
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
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-warning" id="more">Xem thêm</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var $tr = 2;
            $("#more").click(function() {
                $.post("/KhoaLuan/ajax", {
                    trang: $tr
                }, function(data) {
                    $("#ds").append(data);
                });
                $tr = $tr + 1;
            });
        });
    </script>
</body>

</html>