<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
    <div class="container">
        <div class="alert alert-success" role="alert" id="myAlert" style="display: none;">
        </div>
        <div class="row" style="position: relative; padding-top: 20px;">
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
                        <th scope="col"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                New
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Muốn Xóa?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formreset">
                                <input type="text" name="nameproduct" id="nameproduct" placeholder="Nhập tên sản phẩm" required>
                                <input type="text" name="priceproduct" id="priceproduct" placeholder="Nhập giá sản phẩm" required>
                                <input type="text" name="category" id="category" placeholder="Nhập category" required>
                                <input type="text" name="brand" id="brand" placeholder="Nhập Thương Hiệu" required>
                                <input type="text" name="des" id="des" placeholder="Mô tả Sản phẩm" required>
                                <input type="file" name="product_image" id="image-input" required>
                                <img src="" alt="img" id="product-image" style="width: 100px; display: none;">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const editButtons = document.getElementsByClassName('edit-button');
        const myimg = document.getElementById('product-image');
        var imageInput = document.getElementById("image-input");
        var currenttext = "";
        //load anh khi chon file
        imageInput.addEventListener("change", function() {
            var file = imageInput.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                myimg.src = event.target.result;
                myimg.style.display = "block";
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        })
        // call ajax load dữ liệu 
        function Load() {
            $.ajax({
                url: "/KhoaLuan/ajax/Load",
                method: "POST",
                success: function(data) {
                    $("#content").html(data);
                }
            });
        }
        // bat su kien dbclick td
        function enableEditing(element) {
            element.contentEditable = true;
            element.focus();
            currenttext = element.innerHTML;
        }
        //call ajax edit
        function Edit(id, text, colum) {
            $.ajax({
                url: "/KhoaLuan/ajax/Edit",
                method: "POST",
                data: {
                    idproduct: id,
                    content: text,
                    columname: colum
                },
                success: function(data) {
                    Load();
                    alert("Thanh Cong");
                }
            })
        }
        //su kien khi bam bat ky sau khi edit 
        $(document).on('blur', '.mytdname', function() {
            var text = $(this).text();
            var id = $(this).data("dataid");
            if (text != "" && text != null && text != currenttext) {
                Edit(id, text, "name_product");
            }
            if (text == "") {
                $(this).text(currenttext);
                alert("Khong duoc de trong");
            }
        })
        $(document).on('blur', '.mytdprice', function() {
            var id = $(this).data("dataprice");
            var text = $(this).text();
            if (text != "" && text != null && text != currenttext) {
                Edit(id, text, "price_product");
            }
            if (text == "") {
                $(this).text(currenttext);
                alert("Khong duoc de trong");
            }
        })
        $(document).on('blur', '.mytddes', function() {
            var id = $(this).data("datades");
            var text = $(this).text();
            if (text != "" && text != null && text != currenttext) {
                Edit(id, text, "des_product");
            }
            if (text == "") {
                $(this).text(currenttext);
                alert("Khong duoc de trong");
            }

        })
        $(document).on('blur', '.mytdcate', function() {
            var id = $(this).data("datacate");
            var text = $(this).text();
            if (text != "" && text != null && text != currenttext) {
                Edit(id, text, "cate_id");
            }
            if (text == "") {
                $(this).text(currenttext);
                alert("Khong duoc de trong");
            }
        })
        $(document).on('blur', '.mytdbrand', function() {
            var id = $(this).data("databrand");
            var text = $(this).text();
            if (text != "" && text != null && text != currenttext) {
                Edit(id, text, "brand_product");
            }
            if (text == "") {
                $(this).text(currenttext);
                alert("Khong duoc de trong");
            }
        })
        // ready 
        $(document).ready(function() {
            Load();
            //su kien click them 
            $("#submit").click(function() {
                var tensp = document.getElementById("nameproduct").value;
                var giasp = document.getElementById("priceproduct").value;
                var catesp = document.getElementById("category").value;
                var brandsp = document.getElementById("brand").value;
                var dessp = document.getElementById("des").value;
                var image = $('#image-input')[0].files[0];

                var formData = new FormData();
                formData.append('name', tensp);
                formData.append('price', giasp);
                formData.append('category', catesp);
                formData.append('brand', brandsp);
                formData.append('description', dessp);
                formData.append('image', image);
                if (tensp != "" && giasp != "" && catesp != "" && brandsp != "" && dessp != "" && image != null) {
                    $.ajax({
                        url: "/KhoaLuan/ajax/Insert",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            Load();
                            var alertElement = document.getElementById('myAlert');
                            alertElement.textContent = "Them thanh cong!";
                            alertElement.style.backgroundColor = "Gray";
                            alertElement.style.display = 'block';
                            setTimeout(function() {
                                alertElement.style.display = 'none';
                            }, 2000);
                            document.getElementById("nameproduct").value = "";
                            document.getElementById("priceproduct").value = "";
                            document.getElementById("category").value = "";
                            document.getElementById("brand").value = "";
                            document.getElementById("des").value = "";
                            document.getElementById("image-input").value = "";
                            myimg.style.display = "none";
                        }
                    })
                } else {
                    var alertElement = document.getElementById('myAlert');
                    alertElement.textContent = "Vui Long Nhap Day Du Thong Tin San Pham!";
                    alertElement.style.backgroundColor = "yellow";
                    alertElement.style.display = 'block';
                    setTimeout(function() {
                        alertElement.style.display = 'none';
                    }, 2000);
                }
            });
        });
        // sk db td chuwa img 
        function enableEditing2(element) {
            var dataimg = element.getAttribute('data-dataimg');
            var inputFile = document.createElement('input');
            inputFile.type = 'file';
            inputFile.accept = 'image/*';
            inputFile.click();
            inputFile.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function() {
                    var imageSrc = reader.result;
                    var imageElement = document.getElementById('myimg');
                    imageElement.src = imageSrc;
                    // element.innerHTML = '';
                    // element.appendChild(imageElement);
                    inputFile.style.display = 'none';
                    var formData = new FormData();
                    formData.append('id', dataimg)
                    formData.append('image', file);
                    formData.append('columname', "img_product");
                    $.ajax({
                        url: "/KhoaLuan/ajax/EditImage",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            Load();
                            alert("Thanh Cong");
                        }
                    })
                };
                reader.readAsDataURL(file);
            });
        }
        //bat su kien xoa
        function Delete($id) {
            $.ajax({
                url: "/KhoaLuan/ajax/Delete",
                method: "POST",
                data: {
                    id_product: $id
                },
                success: function(data) {
                    Load();
                }
            })
        }
        //funtion khi click vao icon xoa
        function Xoa(element) {
            var dataid = element.getAttribute('data-dataid');
            var modal = document.getElementById('exampleModal2');
            var deleteButton = modal.querySelector('.btn-primary');
            var closeButton = modal.querySelector('.btn-close');
            deleteButton.addEventListener('click', function() {
                // Thực hiện xóa (gọi hàm Delete(dataid) ở đây)
                Delete(dataid);
                // Đóng modal sau khi xóa thành công
                closeButton.click();
            });
        }
    </script>
</body>

</html>