<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_detail_product.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col">
            <table class="table" data-dataid="<?php echo $data['id']; ?>" id="mytb">
                <thead>
                    <tr>
                        <th scope="col">Màu</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Size</th>
                        <th scope="col">Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($data['data'])) : ?>
                        <tr>
                            <td><?php echo $row['color'] ?></td>
                            <td><img src="/KhoaLuan/<?php echo $row['img_product'] ?>" alt="anh san pham"></td>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo $row['count_product'] ?></td>
                        <?php endwhile; ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" style="margin-right: 5px;" id="color">
                    <option value="0" selected>Chọn màu</option>
                    <?php while ($row = mysqli_fetch_assoc($data['color'])) : ?>
                        <option value="<?php echo $row['id_color'] ?>"><?php echo $row['color'] ?></option>
                    <?php endwhile; ?>
                </select>
                <select class="form-select" aria-label="Default select example" style="margin-right: 5px;" id="size">
                    <option value="0">Chọn size</option>
                    <?php while ($row = mysqli_fetch_assoc($data['size'])) : ?>
                        <option value="<?php echo $row['id_size'] ?>"><?php echo $row['size'] ?></option>
                    <?php endwhile; ?>
                </select>
                <input type="number" class="form-control" placeholder="Số lượng" aria-label="Server" min="1" id="count" value="" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" onchange="previewImage(event)">
                </div>
            </div>
            <div>
                <img src="" alt="upload" style="display: none;" id="myimg">
                <button class="btn-info" id="btn_add">Thêm</button>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
            var img = document.getElementById("myimg");

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.style.display = "block";
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#btn_add").click(function() {
            var color = document.getElementById("color").value;
            var size = document.getElementById("size").value;
            var count = document.getElementById("count").value;
            var image = document.getElementById("inputGroupFile02").files[0];
            var img = document.getElementById("myimg");
            if (image != null && color != 0 && size != 0 && count != "") {
                var formData = new FormData();
                formData.append('id', $("#mytb").data('dataid'));
                formData.append('image', image);
                formData.append('size', size);
                formData.append('color', color);
                formData.append('count', count);
                $.ajax({
                    url: "/KhoaLuan/ajax/AddDetailProduct",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("Thành công");
                    }
                });
            }
            else{
                alert("Vui lòng nhập đầy đủ thông tin");
            }
        });
    </script>
</body>

</html>