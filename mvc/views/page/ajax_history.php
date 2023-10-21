<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_history.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row history_info">
            <div class="col-12" style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: center;">
                    <!-- <h4 id="product4"> <?php echo $data['info']['status'] ?>
                    </h4> -->
                    <h4> THÔNG TIN ĐƠN HÀNG
                    </h4>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <b for="product1">Mã đơn hàng: </b>
                    <span id="product1"> <?php echo $data['info']['id_oder'] ?>
                    </span>
                </div>
                <div>
                    <b for="product2">Ngày đặt: </b>
                    <span id="product2"> <?php echo $data['info']['orderdate'] ?>
                    </span>
                </div>
                <div>
                    <b for="product3">Hình Thức thanh toán: </b>
                    <span id="product"> <?php echo $data['info']['pay'] ?>
                    </span>
                </div>
                <div>
                    <b for="product3">Hình Thức Vận Chuyển: </b>
                    <span id="product"> <?php echo $data['info']['ship'] ?>
                    </span>
                </div>
                <!-- <div>
                    <span for="product4">Trạng Thái: </span>
                    <span id="product4"> <?php echo $data['info']['status'] ?>
                    </span>
                </div> -->
            </div>
            <div class="col-6">
                <div>
                    <b for="product11">Tên: </b>
                    <span id="product11"> <?php echo $data['info']['name_user'] ?>
                    </span>
                </div>
                <div>
                    <b for="product22">Email: </b>
                    <span id="product22"> <?php echo $data['info']['email'] ?>
                    </span>
                </div>
                <div>
                    <b for="product33">Số điện thoại: </b>
                    <span id="product33"> <?php echo $data['info']['phone'] ?>
                    </span>
                </div>
                <div>
                    <b for="product44">Địa chỉ: </b>
                    <span id="product44"> <?php echo $data['info']['address'] ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row history_info">
            <div class="col-12" style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: center;">
                    <h4>CHI TIẾT ĐƠN HÀNG
                    </h4>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Màu</th>
                        <th scope="col">Size</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tạm Tính</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                        <tr>
                            <td> <?php echo $data['data'][$i]['name_product'] ?></td>
                            <td> <?php echo $data['data'][$i]['color'] ?></td>
                            <td> <?php echo $data['data'][$i]['size'] ?></td>
                            <td> <?php echo number_format($data['data'][$i]['price_product'], 0, ',', '.') ?></td>
                            <td> <?php echo $data['data'][$i]['count_product'] ?></td>
                            <td> <?php echo number_format($data['data'][$i]['count_product'] * $data['data'][$i]['price_product'], 0, ',', '.') ?></td>
                        </tr>
                    <?php
                    endfor;
                    ?>
                    <th scope="row">Tổng (Phí giao hàng: <?php echo  number_format($data['info']['id_ship'] * 30000, 0, ',', '.') ?>đ)</th>
                    <td colspan="4"></td>
                    <td colspan="1">
                        <b>
                            <?php echo number_format($data['info']['total'], 0, ',', '.') ?> đ
                        </b>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="row history_btn">
            <div class="col d-flex align-items-center justify-content-center">
                <?php if ($data['info']['id_status'] == 1) : ?>
                    <a class="btn btn-danger" type="button" role="button" style="margin: 5px;" id="btn_huy" data-dataid="<?php echo $data['info']['id_oder'] ?>">Hủy Đặt Hàng</a>
                <?php endif; ?>
                <a class="btn btn-primary" href="/KhoaLuan/home" role="button" style="margin: 5px;">Tiếp Tục Mua Hàng</a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("btn_huy").addEventListener("click", function() {
            var confirmation = confirm("Bạn có chắc chắn muốn hủy đặt hàng không?");
            if (confirmation) {
                $.ajax({
                    url: "/KhoaLuan/ajax/Cancel",
                    method: "POST",
                    data: {
                        id: $("#btn_huy").data("dataid")
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>