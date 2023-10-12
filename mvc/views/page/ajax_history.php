<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div>
                    <span for="product1">Mã đơn hàng: </span>
                    <span id="product1"> <?php echo $data['info']['id_oder'] ?>
                    </span>
                </div>
                <div>
                    <span for="product2">Ngày đặt: </span>
                    <span id="product2"> <?php echo $data['info']['orderdate'] ?>
                    </span>
                </div>
                <div>
                    <span for="product3">Hình Thức thanh toán: </span>
                    <span id="product"> <?php echo $data['info']['type_pay'] ?>
                    </span>
                </div>
                <div>
                    <span for="product4">Trạng Thái: </span>
                    <span id="product4"> <?php echo $data['info']['status'] ?>
                    </span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <span for="product11">Tên: </span>
                    <span id="product11"> <?php echo $data['info']['name_user'] ?>
                    </span>
                </div>
                <div>
                    <span for="product22">Email: </span>
                    <span id="product22"> <?php echo $data['info']['email'] ?>
                    </span>
                </div>
                <div>
                    <span for="product33">Số điện thoại: </span>
                    <span id="product33"> <?php echo $data['info']['phone'] ?>
                    </span>
                </div>
                <div>
                    <span for="product44">Địa chỉ: </span>
                    <span id="product44"> <?php echo $data['info']['address'] ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
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
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td> <?php echo $data['data'][$i]['name_product'] ?></td>
                            <td> <?php echo $data['data'][$i]['color'] ?></td>
                            <td> <?php echo $data['data'][$i]['size'] ?></td>
                            <td> <?php echo $data['data'][$i]['price_product'] ?></td>
                            <td> <?php echo $data['data'][$i]['count_product'] ?></td>
                            <td> <?php echo $data['data'][$i]['count_product'] * $data['data'][$i]['price_product'] ?></td>
                        </tr>
                    <?php
                    endfor;
                    ?>
                    <th scope="row">Tổng</th>
                    <td colspan="5"></td>
                    <td colspan="1">
                        <h6><?php echo $data['info']['total'] ?></h6>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
                <?php if ($data['info']['id_status'] == 1) : ?>
                    <a class="btn btn-danger" type="button" role="button" style="margin: 5px;" id="btn_huy" data-dataid="<?php echo $data['info']['id_oder']?>">Hủy Đặt Hàng</a>
                <?php endif; ?>
                <a class="btn btn-primary" href="/KhoaLuan/phome" role="button" style="margin: 5px;">Tiếp Tục Mua Hàng</a>
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
                        alert("Đã Hủy Đơn Hàng");
                    }
                });
            }
        });
    </script>
</body>

</html>