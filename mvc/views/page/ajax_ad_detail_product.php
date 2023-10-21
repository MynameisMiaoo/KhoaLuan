<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_ad_detail_product.css" rel="stylesheet">

</head>

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Mã ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giá</th>
                <th scope="col">Thể Loại</th>
                <th scope="col">Thương Hiệu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($data['data']) == 0) : ?>
                <tr>
                    <td colspan="8">Chưa có sản phẩm nào!</td>
                </tr>
            <?php endif; ?>
            <?php while ($row = mysqli_fetch_assoc($data['data'])) : ?>
                <tr ondblclick="handleDoubleClick('<?php echo $row['id_product']; ?>')">
                    <th scope="row"><?php echo $row["id_product"]; ?></th>
                    <td class="mytdname" data-dataid="<?php echo $row["id_product"]; ?>"> <?php echo $row["name_product"]; ?></td>
                    <td class="mytdimg" data-dataimg="<?php echo $row["id_product"]; ?>"><img id="myimg" style="height: 100px;" src="/KhoaLuan/<?php echo $row["img_product"]; ?>" alt="anh san pham"></td>
                    <td class="mytddes" data-datades="<?php echo $row["id_product"]; ?>"><?php echo $row["des_product"]; ?></td>
                    <td class="mytdprice" data-dataprice="<?php echo $row["id_product"]; ?>"><?php echo number_format($row["price_product"], 0, ',', '.'); ?></td>
                    <td class="mytdcate" data-datacate="<?php echo $row["id_product"]; ?>"><?php echo $row["cate_product"]; ?></td>
                    <td class="mytdbrand" data-databrand="<?php echo $row["id_product"]; ?>"><?php echo $row["brand"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>