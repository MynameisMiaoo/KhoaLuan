<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <ul>
                    <li><label>Link</label></li>
                    <li>
                        <div class="line"></div>
                    </li>
                    <li><a href="/Khoaluan/category/Adidas" id="link">Adidas</a></li>
                    <li><a href="/Khoaluan/category/Nike" id="link">Nike</a>
                    </li>
                    <li><a href="/Khoaluan/category/Jordan" id="link">Jordan</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-12">
                <ul>
                    <li><label>Contact</label></li>
                    <li>
                        <div class="line"></div>
                    </li>
                    <li>0387449173</li>
                    <li>sanshsnsg2@gmail.com</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <ul>
                    <li><label>Follow</label></li>
                    <li>
                        <div class="line"></div>
                    </li>
                    <li>
                        <div class="input-group mb-3" id="input">
                            <input type="text" class="form-control " id="inputemail" placeholder="Nhập email nhận thông báo khuyến mãi" aria-label="Your email" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Send</button>
                        </div>
                    </li>
                    <li id="notifi">
                        <h6 id="errorContainer"></h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#button-addon2").click(function() {
                var uemail = $("#inputemail").val();
                if (!isValidEmail(uemail)) {
                    $("#errorContainer").text("Email không hợp lệ!");
                    $("#errorContainer").show();
                    setTimeout(function() {
                        $("#errorContainer").hide();
                    }, 1600);
                } else {
                    $.post("/KhoaLuan/ajax/Email", {
                        email: uemail
                    }, function(data) {});
                    $("#errorContainer").text("Cảm ơn, chúng tôi đã nhận được email của bạn");
                    $("#errorContainer").css("color","green");
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