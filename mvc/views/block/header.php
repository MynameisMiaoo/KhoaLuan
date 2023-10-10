<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Khoaluan/public/css/nav.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/02dbb38eba.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="myNav">
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand">
                        <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="logo" width="30" height="24">
                    </a>
                </div>
            </nav>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Khoaluan/phome">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Khoaluan/category/Jordan">Jordan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Khoaluan/category/Adidas">Adidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Khoaluan/category/Nike">Nike</a>
                    </li>
                    <!-- <li class="nav-item">
                        <div class="dropdown">
                            <div class="dropdown__select">
                                <span class="dropdown__selected">Gio Hang</span>
                                <i class="fa-sharp fa-solid fa-cart-shopping fa-shake" style="color: #24a350;"></i>
                            </div>
                            <ul class="dropdown__list">
                                <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/Cart')">
                                    <span class="dropdown__text">Giỏ Hàng</span>
                                </li>
                                <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/Paydone')">
                                    <span class="dropdown__text">Lịch Sử Mua Hàng</span>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <form class="d-flex" method="GET" id="myformm">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="inputContent" name="ct_search">
                            <button class="btn btn-outline-success" type="submit" onclick="setFormAction('/KhoaLuan/Search')">Search</button>
                        </form>
                    </li> -->
                    <!-- <li class="nav-item">
        
                    </li> -->
                </ul>
                <form class="d-flex" method="GET" id="myformm">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="inputContent" name="ct_search">
                    <button class="btn btn-outline-success" type="submit" onclick="setFormAction('/KhoaLuan/Search')">Search</button>
                </form>
                <div class="dropdown" style="width: auto; margin-left: 15px;">
                    <div class="dropdown__select">
                        <span class="dropdown__selected">Gio Hang</span>
                        <i class="fa-sharp fa-solid fa-cart-shopping fa-shake" style="color: #24a350;"></i>
                    </div>
                    <ul class="dropdown__list">
                        <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/Cart')">
                            <span class="dropdown__text">Giỏ Hàng</span>
                        </li>
                        <li class="dropdown__item" onclick="redirectTo('/KhoaLuan/Paydone')">
                            <span class="dropdown__text">Lịch Sử Mua Hàng</span>
                        </li>
                    </ul>
                </div>
                <div style="cursor: pointer; padding-left: 15px;">
                    <span onclick="Login('/KhoaLuan/Login')">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "LogOut";
                        } else {
                            echo "LogIn";
                        }
                        ?>
                    </span>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // JavaScript
        function redirectTo(url) {
            window.location.href = url;
        }
        function Login(url){
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