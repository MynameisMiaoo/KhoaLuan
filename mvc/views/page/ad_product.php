<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input {
            display: block;
            margin-bottom: 10px;
        }

        textarea {
            display: block;
            margin-bottom: 10px;
        }

        .inner-div {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            background-color: green;
        }
        .inner-div2 {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="position: relative;">
            <div class="inner-div" id="divadd">
                <form id = "formadd" action="/KhoaLuan/Admin/Product" method="post" enctype="multipart/form-data">
                    <input type="text" name="nameproduct" placeholder="Nhập tên sản phẩm" >
                    <input type="text" name="priceproduct" placeholder="Nhập giá sản phẩm" >
                    <input type="text" name="category" placeholder="Nhập category" >
                    <input type="text" name="brand" placeholder="Nhập Thương Hiệu" >
                    <input type="text" name="des" placeholder="Mô tả Sản phẩm" >
                    <input type="file" name="product_image" id="image-input" >
                    <button type="button" onclick="changeProductImage()" id ="upload">Upload</button>
                    <img src="" alt="img" id="product-image" style="width: 100px;">
                    <button type="submit" id = "btnsubmit">ADD</button>
                    <button type="button" id = "btncancel">Cancel</button>
                </form>
            </div>
            <div class="inner-div2" id="edit-form-container">
                <form id="edit-form" action="/KhoaLuan/Admin/Product" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="edit-product-id" name="product_id" value="" >
                    <label for="edit-product-name">Tên sản phẩm:</label>
                    <input type="text" id="edit-product-name" name="product_name" value="" >
                    <label for="edit-product-img">Hình ảnh:</label>
                    <input type="hidden" id="edit-product-img" name="product_img" value="" >
                    <input type="file" id="image-input" name="product_image">
                    <button type="button" onclick="changeProductImage()">Thay đổi ảnh</button>
                    <br>
                    <img src="" alt="img" id="product-image" style="width: 100px;">
                    <label for="edit-product-description">Mô tả:</label>
                    <textarea id="edit-product-description" name="product_description"></textarea>
                    <label for="edit-product-price">Giá:</label>
                    <input type="text" id="edit-product-price" name="product_price" value="" >
                    <label for="edit-product-category">Danh mục:</label>
                    <input type="text" id="edit-product-category" name="product_category" value="" >
                    <label for="edit-product-brand">Thương hiệu:</label>
                    <input type="text" id="edit-product-brand" name="product_brand" value="" >
                    <button type="submit">Submit</button>
                    <button type="button" id="cancel-button">Cancel</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Img</th>
                        <th scope="col">Describe</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cate_Id</th>
                        <th scope="col">Brand</th>
                        <th scope="col"><button id="btnadd" style="width: 100%;">ADD</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($data['data'])) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id_product'] ?></th>
                            <td><?php echo $row['name_product'] ?></td>
                            <td><img style="width: 150px;" src="/KhoaLuan/<?php echo $row['img_product'] ?>" alt="<?php echo $row['img_product'] ?>"></td>
                            <td><?php echo $row['des_product'] ?></td>
                            <td><?php echo $row['price_product'] ?></td>
                            <td><?php echo $row['cate_id'] ?></td>
                            <td><?php echo $row['brand_product'] ?></td>
                            <td>
                                <button class="edit-button" data-id="<?php echo $row['id_product']; ?>">Sửa</button>
                            </td>
                            <td>
                                <a href="/KhoaLuan/Admin/Product/<?php echo $row['id_product'] ?>">
                                    <i class="fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="row" id="edit-form-container" style="display: none; position: relative; background-color: red;">
            <div class="col">
                <form id="edit-form" action="/KhoaLuan/Admin/Product" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="edit-product-id" name="product_id" value="" >
                    <label for="edit-product-name">Tên sản phẩm:</label>
                    <input type="text" id="edit-product-name" name="product_name" value="" >
                    <label for="edit-product-img">Hình ảnh:</label>
                    <input type="hidden" id="edit-product-img" name="product_img" value="" >
                    <input type="file" id="image-input" name="product_image">
                    <button type="button" onclick="changeProductImage()">Thay đổi ảnh</button>
                    <br>
                    <img src="" alt="img" id="product-image" style="width: 100px;">
                    <label for="edit-product-description">Mô tả:</label>
                    <textarea id="edit-product-description" name="product_description"></textarea>
                    <label for="edit-product-price">Giá:</label>
                    <input type="text" id="edit-product-price" name="product_price" value="" >
                    <label for="edit-product-category">Danh mục:</label>
                    <input type="text" id="edit-product-category" name="product_category" value="" >
                    <label for="edit-product-brand">Thương hiệu:</label>
                    <input type="text" id="edit-product-brand" name="product_brand" value="" >
                    <button type="submit">Submit</button>
                    <button type="button" id="cancel-button">Cancel</button>
                </form>
            </div> -->
        </div>
    </div>
    </div>
    <script>
        var btnadd = document.getElementById('btnadd');
        var btnsub = document.getElementById('btnsubmit');
        var btncan = document.getElementById('btncancel');
        var divadd = document.getElementById('divadd');
        var myform = document.getElementById('formadd');
        var myimg=document.getElementById('product-image');
        var btnupload = document.getElementById('upload');
        btnadd.addEventListener('click', function() {
            myform.reset();
            divadd.style.display = 'block';
        })
        btncan.addEventListener('click', function() {
            divadd.style.display = 'none';
        })

        btnsub.addEventListener('click', function() {
            divadd.style.display = 'none';

        })
        function changeProductImage() {
            var imageInput = document.getElementById("image-input");
            var productImage = document.getElementById("product-image");
            var imageValueInput = document.getElementById("edit-product-img");
            var file = imageInput.files[0];
            var reader = new FileReader();

            reader.onload = function(event) {
                productImage.src = event.target.result;
                imageValueInput.value = event.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        const editButtons = document.getElementsByClassName('edit-button');
        for (let i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener('click', function(event) {
                const productId = event.target.getAttribute('data-id');
                const productName = event.target.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
                const productImg = event.target.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[0].getAttribute('src');
                const productDescription = event.target.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
                const productPrice = event.target.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
                const productCategory = event.target.parentNode.previousElementSibling.previousElementSibling.textContent;
                const productBrand = event.target.parentNode.previousElementSibling.textContent;

                document.getElementById('edit-product-id').value = productId;
                document.getElementById('edit-product-name').value = productName;
                document.getElementById('edit-product-img').value = productImg;
                document.getElementById('edit-product-description').value = productDescription;
                document.getElementById('edit-product-price').value = productPrice;
                document.getElementById('edit-product-category').value = productCategory;
                document.getElementById('edit-product-brand').value = productBrand;
                // document.getElementById('img').setAttribute('src') = productImg;
                var previewImage = document.getElementById("product-image");
                previewImage.src = productImg;
                document.getElementById('edit-form-container').style.display = 'block';
            });
        }

        document.getElementById('cancel-button').addEventListener('click', function() {
            document.getElementById('edit-form-container').style.display = 'none';
        });
    </script>
</body>

</html>