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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Khoaluan/Cart">
                            <i class="fa-solid fa-cart-shopping fa-shake" style="color: #2b8c3b; right: 40px; position: fixed;"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '<lable style="color: #d11a20; right: 100px; position: fixed;">LogOut</lable>';
                            echo '<a class="nav-link active" aria-current="page" href="/Khoaluan/Login"><i class="fa-solid fa-right-from-bracket" style="color: #d11a20; right: 80px; position: fixed;"></i> </a>';
                        } else {
                            echo '<lable style="color: #d11a20; right: 100px; position: fixed;">LogIn</lable>';
                            echo '<a class="nav-link active" aria-current="page" href="/Khoaluan/Login"><i class="fa-solid fa-user" style="color: #d11a20; right: 80px; position: fixed;"></i> </a>';
                        }
                        ?>
                        <!-- <i class="fa-solid fa-right-from-bracket"></i>
                            <i class="fa-solid fa-user" style="color: #d11a20; right: 80px; position: fixed;"></i> -->
                    </li>
                </ul>
                <form class="d-flex" style=" margin-right: 150px;" method="GET" id="myformm">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="inputContent" name="ct_search">
                    <button class="btn btn-outline-success" type="submit" onclick="setFormAction('/KhoaLuan/Search')">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <script>
        function setFormAction(url) {
            var inputContent = document.getElementById("inputContent").value;
            var form = document.getElementById("myformm");
            form.action = url;
            // +"/" + encodeURIComponent(inputContent)
        }
    </script>
</body>

</html>