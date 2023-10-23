<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="/KhoaLuan/public/css/ad_color_size.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row box">
            <div class="col mybox">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập thương hiệu mới" aria-label="Recipient's username" aria-describedby="button-addon2" id="input_color">
                    <button class="btn btn-outline-secondary" type="button" id="btn_add_color">Thêm</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã Thuơng Hiệu</th>
                            <th scope="col">Thương hiệu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($data['brand'])) : ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_brand'] ?></th>
                                <td><?php echo $row['brand'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="col mybox">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập loại sản phẩm mới" aria-label="Recipient's username" aria-describedby="button-addon2" id="input_size">
                    <button class="btn btn-outline-secondary" type="button" id="btn_add_size">Thêm</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã Loại sản Phẩm </th>
                            <th scope="col">Loại sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($data['cate'])) : ?>
                            <tr>
                                <th scope="row"><?php echo $row['cate_id'] ?></th>
                                <td><?php echo $row['cate_product'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $("#btn_add_color").click(function() {
            $.ajax({
                url: "/KhoaLuan/ajax/AddBrand",
                method: "POST",
                data: {
                    brand: $("#input_color").val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        })
        $("#btn_add_size").click(function() {
            $.ajax({
                url: "/KhoaLuan/ajax/AddCate",
                method: "POST",
                data: {
                    cate: $("#input_size").val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        })
    </script>
</body>

</html>