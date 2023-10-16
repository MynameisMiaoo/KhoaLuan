<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập màu mới" aria-label="Recipient's username" aria-describedby="button-addon2" id="input_color">
                    <button class="btn btn-outline-secondary" type="button" id="btn_add_color">Thêm</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã màu</th>
                            <th scope="col">Màu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($data['color'])) : ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_color'] ?></th>
                                <td><?php echo $row['color'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập size mới" aria-label="Recipient's username" aria-describedby="button-addon2"id="input_size">
                    <button class="btn btn-outline-secondary" type="button" id="btn_add_size">Thêm</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã size</th>
                            <th scope="col">Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($data['size'])) : ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_size'] ?></th>
                                <td><?php echo $row['size'] ?></td>
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
                url: "/KhoaLuan/ajax/AddColor",
                method: "POST",
                data: {
                    color: $("#input_color").val()
                },
                success: function(data) {
                    location.reload();
                }
            });

        })
        $("#btn_add_size").click(function() {
            $.ajax({
                url: "/KhoaLuan/ajax/AddSize",
                method: "POST",
                data: {
                    size: $("#input_size").val()
                },
                success: function(data) {
                    location.reload();
                }
            });

        })
    </script>
</body>

</html>