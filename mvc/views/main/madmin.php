<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/02dbb38eba.js" crossorigin="anonymous"></script>
    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="background-color: red; height: 10vh;">
            <h5>Hi, Admin</h5>
            <a href="/KhoaLuan/Login"> <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-2" style="background-color: yellow; height: 100vh;">
                <div class="product-category">
                    <h4>Danh mục</h4>
                    <ul>
                        <li>
                            <a href="/KhoaLuan/Admin">Home</a>
                        </li>
                        <li>
                            <a href="/KhoaLuan/Admin/Product">Product</a>
                        </li>
                        <li>
                            <a href="">...</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-10">
                <?php require_once "./mvc/views/page/" . $data["page"] . ".php"; ?>
            </div>
        </div>
    </div>
</body>

</html>