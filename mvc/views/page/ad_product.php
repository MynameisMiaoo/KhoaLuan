<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ad_product.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col highlight" onclick="highlight(this)" data-dataid="1">Hiển Thị</div>
            <div class="col " onclick="highlight(this)" data-dataid="2">Ẩn</div>
        </div>
        <div class="row">
            <div class="alert alert-success" role="alert" id="myAlert" style="display: none;">
            </div>
        </div>
        <div class="row box" style="position: relative;">
            <div class="tbl" id="content">
            </div>
            <!-- Xóa  -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa Sản Phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Bạn có chắc muốn thay đổi trạng thái sản phẩm này?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- thêm  -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Sản Phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formreset">
                                <input type="text" class="form-control" name="nameproduct" id="nameproduct" placeholder="Nhập tên sản phẩm" autocomplete="off">
                                <input type="text" class="form-control" name="priceproduct" id="priceproduct" placeholder="Nhập giá sản phẩm" autocomplete="off">
                                <select class="form-select" aria-label="Default select example" name="category" id="category">
                                    <option value="0" selected>Chọn Thể Loại</option>
                                    <option value="1">Thể Thao</option>
                                    <option value="2">Dã Ngoại</option>
                                    <option value="3">Chạy Bộ</option>
                                </select>
                                <select class="form-select" aria-label="Default select example" name="brand" id="brand">
                                    <option value="0" selected>Chọn Thương Hiệu</option>
                                    <option value="1">Adidas</option>
                                    <option value="2">Nike</option>
                                    <option value="3">Jordan</option>
                                </select>
                                <input type="text" class="form-control" name="des" id="des" placeholder="Mô tả Sản phẩm" autocomplete="off">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="product_image" id="image-input">
                                </div>
                                <img src="" alt="img" id="product-image" style="width: 100px; display: none;">
                                <div class="input-group mb-3">
                                    <select class="form-select" aria-label="Default select example" style="margin-left: 5px;" id="color">
                                        <option value="0" selected>Chọn màu</option>
                                        <?php while ($row = mysqli_fetch_assoc($data['color'])) : ?>
                                            <option value="<?php echo $row['id_color'] ?>"><?php echo $row['color'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <select class="form-select" aria-label="Default select example" style="margin-left: 5px;" id="size">
                                        <option value="0">Chọn size</option>
                                        <?php while ($row = mysqli_fetch_assoc($data['size'])) : ?>
                                            <option value="<?php echo $row['id_size'] ?>"><?php echo $row['size'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <input type="number" class="form-control" placeholder="Số lượng" aria-label="Server" style="margin-left: 5px;" min="1" id="count" value="" autocomplete="off">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="submit">Xác nhận</button>
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
                    Load(1);
                    alert("Thanh Cong");
                }
            })
        }

        function highlight(element) {
            var cols = document.getElementsByClassName("col");
            for (var i = 0; i < cols.length; i++) {
                cols[i].classList.remove("highlight");
            }
            element.classList.add("highlight");
            Load(element.getAttribute("data-dataid"));
        }
        // call ajax load dữ liệu 
        function Load(type) {
            $.ajax({
                url: "/KhoaLuan/ajax/Load",
                method: "POST",
                data: {
                    status: type
                },
                success: function(data) {
                    $("#content").html(data);
                }
            });
        }
        //bat su kien xoa
        function Delete($id, $status) {
            $.ajax({
                url: "/KhoaLuan/ajax/Delete",
                method: "POST",
                data: {
                    id_product: $id,
                    status: $status
                },
                success: function(data) {
                    Load($status);
                    var newHighlightedElement = document.querySelector('[data-dataid="' + $status + '"]');
                    highlight(newHighlightedElement);
                }
            })
        }
        //funtion khi click vao icon xoa
        function Xoa(element, status) {
            var dataid = element.getAttribute('data-dataid');
            var modal = document.getElementById('exampleModal2');
            var deleteButton = modal.querySelector('.btn-primary');
            var closeButton = modal.querySelector('.btn-close');
            deleteButton.addEventListener('click', function() {
                // Thực hiện xóa (gọi hàm Delete(dataid) ở đây)
                Delete(dataid, status);
                // Đóng modal sau khi xóa thành công
                closeButton.click();
            });
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
            Load(1);
            //su kien click them 
            $("#submit").click(function() {
                var tensp = document.getElementById("nameproduct").value;
                var giasp = document.getElementById("priceproduct").value;
                var catesp = document.getElementById("category").value;
                var brandsp = document.getElementById("brand").value;
                var dessp = document.getElementById("des").value;
                var colorsp = document.getElementById("color").value;
                var sizesp = document.getElementById("size").value;
                var countsp = document.getElementById("count").value;
                var image = $('#image-input')[0].files[0];
                if (tensp != "" && giasp != "" && catesp != 0 && brandsp != 0 && dessp != "" && image != null && colorsp != 0 && sizesp != 0 && countsp != "") {
                    var formData = new FormData();
                    formData.append('name', tensp);
                    formData.append('price', giasp);
                    formData.append('category', catesp);
                    formData.append('brand', brandsp);
                    formData.append('description', dessp);
                    formData.append('image', image);
                    formData.append('color', colorsp);
                    formData.append('size', sizesp);
                    formData.append('count', countsp);
                    $.ajax({
                        url: "/KhoaLuan/ajax/Insert",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            Load(1);
                            var alertElement = document.getElementById('myAlert');
                            alertElement.textContent = "Them thanh cong!";
                            alertElement.style.backgroundColor = "Gray";
                            alertElement.style.display = 'block';
                            setTimeout(function() {
                                alertElement.style.display = 'none';
                            }, 2000);
                            document.getElementById("nameproduct").value = "";
                            document.getElementById("priceproduct").value = "";
                            document.getElementById("category").selectedIndex = 0;
                            document.getElementById("brand").selectedIndex = 0;
                            document.getElementById("color").selectedIndex = 0;
                            document.getElementById("size").selectedIndex = 0;
                            document.getElementById("des").value = "";
                            document.getElementById("count").value = "";
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
                            Load(1);
                            alert("Thanh Cong");
                        }
                    })
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</body>

</html>