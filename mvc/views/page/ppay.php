<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/pay.css" rel="stylesheet">
    <title>Thanh Toán</title>
</head>

<body>
    <div class="container">
        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">HÌNH THỨC THANH TOÁN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 10px; border-radius: 10px;">
                            <input type="radio" name="payment-option" value="cod">
                            <img src="/KhoaLuan/public/img/cod.jpg" alt="Thanh toan cod">
                            <label for="">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div style="padding: 10px; border-radius: 10px;">
                            <input type="radio" name="payment-option" value="momo">
                            <img src="/KhoaLuan/public/img/momo.png" alt="thanh toan momo">
                            <label for="">Thanh toán bằng MOMO</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">HỦY</button>
                        <form action="/KhoaLuan/Pay" method="post" id="myForm">
                            <input name="selectedValue" id="selectedValue" type="hidden" value="">
                            <input type="hidden" value="" name="name" id="idname">
                            <input type="hidden" value="" name="sdt" id="idsdt">
                            <input type="hidden" value="" name="email" id="idemail">
                            <input type="hidden" value="" name="diachi" id="iddiachi">
                            <input type="hidden" value="" name="ship" id="idship">
                            <button type="button" class="btn btn-warning" name="payUrl" id="btn_xn">ĐẶT HÀNG</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="box">
                    <div class="divlb">
                        <h4>Thông Tin Nhận Hàng</h4>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="form-label" style="width: 100%;">Họ tên</span>
                        <input type="text" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" placeholder="Nhập họ và tên người nhận">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="form-label" style="width: 100%;">Số điện thoại </span>
                        <input type="text" id="sdt" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" placeholder="Nhập số điện thoại người nhận">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="form-label" style="width: 100%;">Email</span>
                        <input type="text" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" placeholder="Nhập email người nhận">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="form-label" style="width: 100%;">Địa chỉ nhận hàng </span>
                        <input type="text" id="diachi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" placeholder="Nhập địa chỉ nhận hàng">
                    </div>
                </div>
                <div class="box">
                    <div class="divlb">
                        <h4>Hình Thức Giao Hàng</h4>
                    </div>
                    <div class="form-check divship" onclick="handleDivClick(this)" style="padding: 20px 10px; border-radius: 7px;">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="margin-left: 5px;" value="1">
                        <p class="form-check-label" for="flexRadioDefault1">
                            Nhanh (Nhận hàng trong 3-4 ngày)
                        </p>
                        <span class="float-right">30.000đ</span>
                    </div>
                    <div class="form-check divship" style="padding: 20px 10px; border-radius: 7px;" onclick="handleDivClick(this)">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="margin-left: 5px;" value="2">
                        <p class="form-check-label" for="flexRadioDefault1">
                            Hỏa tốc (Nhận hàng trong 3-4 ngày)
                        </p>
                        <span class="float-right">60.000đ</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="box">
                    <div class="divlb">
                        <h4>Thông Tin Đơn Hàng</h4>
                    </div>
                    <?php
                    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) :
                    ?>
                        <div class="row rowview">
                            <div class="col-6 colimg" style="padding: 10px;">
                                <img src="<?php echo $_SESSION['cart'][$i][3] ?>" alt="anh" style="height: 100px;">
                            </div>
                            <div class="col-6 colinfor">
                                <span class="item-name" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo strtoupper($_SESSION['cart'][$i][0]) ?></span>
                                <span class="item-quantity" style="opacity: 0.85;">Số Lượng: <?php echo $_SESSION['cart'][$i][7] ?></span>
                                <span class="item-total" style="opacity: 0.85;">Tạm tính: <?php echo number_format($_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][7], 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    <?php
                    endfor; ?>
                    <div style="display: flex; padding: 10px;">
                        <span style="width: 100%; opacity: 0.85;">Tổng (Chưa bao gồm phí ship):</span>
                        <h5 style="margin-left: auto; padding-right: 25px;"><?php echo number_format($_SESSION['tong'], 0, ',', '.'); ?>đ</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-warning mybutton" onclick="goback()" role="button">Quay Lại Giỏ Hàng</button>
                <button type="button" class="btn btn-warning mybutton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tiếp tục thanh toán
                </button>
            </div>
        </div>

    </div>
    <script>
        function handleDivClick(div) {
            var allDivs = document.querySelectorAll('.divship');
            var allInputs = document.querySelectorAll('.divship input[type="radio"]');

            for (var i = 0; i < allDivs.length; i++) {
                allDivs[i].classList.remove('selected');
                allInputs[i].checked = false;
            }

            div.classList.add('selected');
            var input = div.querySelector('input[type="radio"]');
            input.checked = true;
            $("#idship").val(input.value);
        }

        function goback() {
            window.history.back();
        }
        const divs = document.querySelectorAll('.modal-body div');
        const inputs = document.querySelectorAll('.modal-body input[type="radio"]');

        const btn_xn = document.getElementById('btn_xn');
        const selectedValueInput = document.getElementById('selectedValue');
        const name = document.getElementById('idname');
        const sdt = document.getElementById('idsdt');
        const diachi = document.getElementById('iddiachi');
        const email = document.getElementById('idemail');
        const emailf = document.getElementById('email');
        const namef = document.getElementById('name');
        const sdtf = document.getElementById('sdt');
        const diachif = document.getElementById('diachi');
        const ship = document.getElementById('idship');

        btn_xn.addEventListener('click', () => {
            const selectedRadio = document.querySelector('.modal-body input[type="radio"]:checked');
            if (selectedRadio) {
                selectedValueInput.value = selectedRadio.value;
                name.value = namef.value;
                email.value = emailf.value;
                diachi.value = diachif.value;
                sdt.value = sdtf.value;
                document.getElementById('myForm').submit();
            }
        });
        divs.forEach((div) => {
            div.addEventListener('click', () => {
                // Xóa lớp "selected" khỏi tất cả các div
                divs.forEach((div) => {
                    div.classList.remove('selected');
                });

                // Xóa thuộc tính "checked" khỏi tất cả các input
                inputs.forEach((input) => {
                    input.checked = false;
                });

                // Thêm lớp "selected" vào div được nhấp
                div.classList.add('selected');

                // Đánh dấu input trong div được nhấp là đã được chọn
                const input = div.querySelector('input[type="radio"]');
                input.checked = true;
            });
        });
    </script>
</body>

</html>