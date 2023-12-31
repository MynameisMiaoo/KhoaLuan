<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_order_detail.css" rel="stylesheet">
</head>

<body>
    <div class="info">
        <span>Mã đơn hàng: </span>
        <b id="madh"><?php echo $data['ma'] ?></b>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Màu</th>
                <th scope="col">Size</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td> <?php echo $data['data'][$i]['name_product'] ?></td>
                    <td> <?php echo number_format($data['data'][$i]['price_product'], 0, ',', '.') ?></td>
                    <td> <?php echo $data['data'][$i]['count_product'] ?></td>
                    <td> <?php echo $data['data'][$i]['color'] ?></td>
                    <td> <?php echo $data['data'][$i]['size'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <div class="option">
        <?php if ($data['check'] == "1") : ?>
            <button type="button" class="btn btn-success btnoption" id="btn_xk">Xuất Kho</button>
        <?php endif; ?>
        <?php if ($data['check'] == "2") : ?>
            <button type="button" class="btn btn-danger btnoption btncancel" id="btn_nk">Hủy</button>
            <button type="button" class="btn btn-success btnoption" id="btn_xn">Đã Giao Hàng</button>
        <?php endif; ?>
    </div>
    <script>
        $("#btn_xk").click(function() {
            //sua trang thai thanh 2 va tru coun trong kho 
            $.ajax({
                url: "/KhoaLuan/ajax/XuatKho",
                method: "POST",
                //can chuyen ma don hang 
                data: {
                    id: $("#madh").text()
                },
                success: function(data) {
                    window.location.href = "/KhoaLuan/admin/Order";
                    alert("Done");
                }
            });
        })
        $("#btn_nk").click(function() {
            //sua trang thai thanh 2 va tru coun trong kho 
            $.ajax({
                url: "/KhoaLuan/ajax/NhapKho",
                method: "POST",
                //can chuyen ma don hang 
                data: {
                    id: $("#madh").text()
                },
                success: function(data) {
                    window.location.href = "/KhoaLuan/admin/Order";
                    alert("Done");
                }
            });
        })
        $("#btn_xn").click(function() {
            //sua trang thai thanh 2 va tru coun trong kho 
            $.ajax({
                url: "/KhoaLuan/ajax/ChangeStatus",
                method: "POST",
                //can chuyen ma don hang 
                data: {
                    id: $("#madh").text()
                },
                success: function(data) {
                    window.location.href = "/KhoaLuan/admin/Order";
                    alert("Done");
                }
            });
        })
    </script>
</body>

</html>