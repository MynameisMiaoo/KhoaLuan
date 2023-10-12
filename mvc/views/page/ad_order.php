<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td,
        th {
            text-align: center;
        }

        tr {
            cursor: pointer;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            background-color: yellow;
            cursor: pointer;
        }

        .highlight {
            background-color: cyan;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="padding-top: 10px;">
            <div class="col highlight" onclick="highlight(this)" data-dataid="1">Đơn hàng mới</div>
            <div class="col " onclick="highlight(this)" data-dataid="2">Đang giao hàng</div>
            <div class="col " onclick="highlight(this)" data-dataid="3">Đã Giao Hàng</div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-12" id="content2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Trạng thái</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                            <tr ondblclick="Get('<?php echo $data['data'][$i]['id_oder']; ?>')">
                                <th scope="row"><?php echo $i + 1 ?></th>
                                <td><?php echo $data['data'][$i]['id_oder'] ?></td>
                                <td><?php echo $data['data'][$i]['name_user'] ?></td>
                                <td><?php echo $data['data'][$i]['address'] ?></td>
                                <td><?php echo $data['data'][$i]['phone'] ?></td>
                                <td><?php echo $data['data'][$i]['total'] ?></td>
                                <td><?php echo $data['data'][$i]['status'] ?></td>
                            </tr>
                        <?php endfor; ?>
                        <?php if (sizeof($data['data']) == 0) : ?>
                            <th scope="row">
                            <td colspan="7">Không có đơn hàng nào.</td>
                            </th>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function Get(ma) {
            $.ajax({
                url: "/KhoaLuan/ajax/GetOrder",
                method: "POST",
                data: {
                    id_oder: ma
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }

        function highlight(element) {
            var cols = document.getElementsByClassName("col");
            for (var i = 0; i < cols.length; i++) {
                cols[i].classList.remove("highlight");
            }
            element.classList.add("highlight");
            CallAjax(element.getAttribute("data-dataid"));
        }

        function CallAjax(data) {
            $.ajax({
                url: "/KhoaLuan/ajax/Order",
                method: "POST",
                data: {
                    status: data
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }
    </script>
</body>

</html>