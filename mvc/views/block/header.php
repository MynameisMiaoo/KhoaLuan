<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/header.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="myNav">
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="logo" width="30" height="24">
                    </a>
                </div>
            </nav> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="/KhoaLuan/home">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="/KhoaLuan/category/Jordan">Jordan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/KhoaLuan/category/Adidas">Adidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/KhoaLuan/category/Nike">Nike</a>
                    </li>
                </ul>
                <form class="d-flex" method="GET" id="myformm">
                    <input class="form-control me-2 custom-search-input" type="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search" id="inputContent" name="ct_search">
                    <button class="btn custom-search-button" type="submit" onclick="setFormAction('/KhoaLuan/search')"><i class="fa-solid fa-magnifying-glass" style="color: #4222e2;"></i></button>
                </form>
                <div class="dropdown" style="width: auto; margin-left: 15px;">
                    <div class="dropdown__select">
                        <!-- <span class="dropdown__selected">Giỏ hàng</span> -->
                        <i class="fa-sharp fa-solid fa-cart-shopping fa-shake" style="color: #24a350;"></i>
                    </div>
                    <ul class="dropdown__list" style="width: max-content;">
                        <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/cart')">
                            <span class="dropdown__text">Giỏ Hàng</span>
                        </li>
                        <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/Paydone')">
                            <span class="dropdown__text">Lịch Sử Mua Hàng</span>
                        </li>
                    </ul>
                </div>
                <div style="cursor: pointer; padding-left: 15px;">
                    <i class="fa-solid fa-user"></i>
                    <span onclick="Login('/KhoaLuan/login')" style="margin: 0px 5px;" class="span">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "Đăng Xuất";
                        } else {
                            echo "Đăng Nhập";
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // JavaScript
        function redirectTo(url) {
            window.location.href = url;
        }

        function Login(url) {
            window.location.href = url;
        }

        function setFormAction(url) {
            var inputContent = document.getElementById("inputContent").value;
            var form = document.getElementById("myformm");
            form.action = url;
            // +"/" + encodeURIComponent(inputContent)
        }
    </script>
</body>

</html>