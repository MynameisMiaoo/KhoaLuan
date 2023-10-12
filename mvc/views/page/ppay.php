<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay</title>
    <style>
        .highlight {
            background-color: yellow;
            color: black;
        }

        .modal-body {
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .modal-body div {
            margin-bottom: 30px;
            align-items: center;
            cursor: pointer;
        }

        .modal-body input[type="radio"] {
            margin-right: 10px;
        }

        .modal-body img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .modal-body label {
            font-size: 16px;
        }

        td,
        th {
            text-align: center;
        }
        button{
            margin: 10px;
        }
        .divlb{
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }
    </style>
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
                        <div>
                            <input type="radio" name="payment-option" value="cod">
                            <img src="/KhoaLuan/public/img/cod.jpg" alt="Thanh toan cod">
                            <label for="">COD</label>
                        </div>
                        <div>
                            <input type="radio" name="payment-option" value="momo">
                            <img src="/KhoaLuan/public/img/momo.png" alt="thanh toan momo">
                            <label for="">MOMO</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay Lại</button>
                        <form action="/KhoaLuan/Pay" method="post" id="myForm">
                            <input name="selectedValue" id="selectedValue" type="hidden" value="">
                            <input type="hidden" value="" name="name" id="idname">
                            <input type="hidden" value="" name="sdt" id="idsdt">
                            <input type="hidden" value="" name="email" id="idemail">
                            <input type="hidden" value="" name="diachi" id="iddiachi">
                            <button type="button" class="btn btn-primary" name="payUrl" id="btn_xn">Xác Nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="divlb"><h4>Thông Tin Nhận Hàng</h4></div>
                <div class="input-group input-group-sm mb-3">
                    <span  class="form-label" style="width: 100%;">Họ tên</span>
                    <input type="text" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span  class="form-label" style="width: 100%;">Số điện thoại </span>
                    <input type="text" id="sdt" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span  class="form-label" style="width: 100%;">Email</span>
                    <input type="text" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span  class="form-label" style="width: 100%;">Địa chỉ nhận hàng </span>
                    <input type="text" id="diachi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="divlb"><h4>Thông Tin Đơn Hàng</h4></div>
                <div class="box">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tạm Tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) :
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i + 1 ?></th>
                                    <td><?php echo $_SESSION['cart'][$i][0] ?></td>
                                    <td><?php echo $_SESSION['cart'][$i][7] ?></td>
                                    <td><?php echo $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][7] ?></td>
                                </tr>
                            <?php
                            endfor; ?>
                            <tr>
                                <th scope="row">Tổng</th>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5><?php echo $_SESSION['tong'] ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-success" onclick="goback()" role="button">Giỏ Hàng</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tiếp tục thanh toán
                </button>
            </div>
        </div>

    </div>
    <script>
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