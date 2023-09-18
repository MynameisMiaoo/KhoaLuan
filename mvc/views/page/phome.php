<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Home</title>
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
                <div class="carousel-item active">
                    <img src="/KhoaLuan/public/img/demo1.jpg" class="d-block w-100" id="img" alt="anh 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/KhoaLuan/public/img/demo2.jpg" class="d-block w-100" id="img" alt="anh 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/KhoaLuan/public/img/demo3.jpg" class="d-block w-100" id="img" alt="anh 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div>
            <label for="">San Pham Noi Bat</label>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data["data"])):?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src=<?php echo $row["img_product"]?> class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2><?php echo $row["price_product"]?> đ</h2>
                        <h5 class="card-title"><?php echo $row["name_product"]?></h5>
                        <p class="card-text"><?php echo $row["des_product"]?></p>
                        <a href="/KhoaLuan/Category/<?php echo $row["brand_product"]?>_detail/<?php echo $row["id_product"]?>" class="btn btn-primary">Chi Tiết</a>
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