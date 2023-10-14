<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_order.css" rel="stylesheet">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tổng</th>
                <th scope="col">Trạng Thái</th>

            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                <tr ondblclick="Get(<?php echo $data['data'][$i]['id_oder'] ?>)">
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
                <td colspan="7">Không có đơn hàng nào.</td>
                </th>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>