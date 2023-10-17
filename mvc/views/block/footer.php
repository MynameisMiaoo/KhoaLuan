<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/fter.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <ul>
                    <li><label>LIÊN KẾT</label></li>
                    <li class="myli"><a href="/KhoaLuan/category/Adidas" class="link">ADIDAS</a></li>
                    <li class="myli"><a href="/KhoaLuan/category/Nike" class="link">NIKE</a>
                    </li>
                    <li class="myli"><a href="/KhoaLuan/category/Jordan" class="link">JORDAN</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-12">
                <ul>
                    <li><label>KẾT NỐI VỚI CHÚNG TÔI</label></li>
                    <li>
                        <span for="">sanshsnsg2@gmail.com</span>
                    </li>
                    <li>
                        <span for="">0387449173</span>
                    </li>
                    <li>
                        <span for="">Quận 12, Hồ Chí Minh</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <ul>
                    <li><label>THEO DÕI CHÚNG TÔI</label></li>
                    <li>
                        <div class="follow" id="input">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " id="inputemail" placeholder="Nhập email nhận thông báo khuyến mãi" aria-label="Your email" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Đăng ký</button>
                            </div>
                            <div id="notifi">
                                <h6 id="errorContainer"></h6>
                            </div>
                        </div>
                    </li>
                    <!-- <li id="notifi">
                        <h6 id="errorContainer"></h6>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#button-addon2").click(function() {
                var uemail = $("#inputemail").val();
                if (!isValidEmail(uemail)) {
                    $("#errorContainer").text("Email bạn nhập không hợp lệ!");
                    $("#errorContainer").show();
                    setTimeout(function() {
                        $("#errorContainer").hide();
                    }, 1600);
                } else {
                    $.post("/KhoaLuan/ajax/Email", {
                        email: uemail
                    }, function(data) {});
                    $("#errorContainer").text("Cảm ơn, chúng tôi đã nhận được email của bạn!");
                    $("#errorContainer").css("color", "green");
                    $("#errorContainer").show();
                    setTimeout(function() {
                        $("#errorContainer").hide();
                    }, 2000);
                }
            })
        })

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>

</html>