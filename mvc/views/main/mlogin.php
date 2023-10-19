<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/login.css">
    <script src="./KhoaLuan/public/javascript/login.js"></script>
    <script src="https://kit.fontawesome.com/02dbb38eba.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid" style="background-color: #dab8c6;">
        <div class="row row-form">
            <div class="col-xl-4 col-md-6 col-sm-9 col-form">
                <div class="button-container">
                    <button class="custom-button clicked" onclick="changeColor(this)" id="dn">Đăng nhập</button>
                    <button class="custom-button" onclick="changeColor(this)" id="dk">Đăng ký</button>
                </div>
                <form method="POST" id="f1" action="login/Check">
                    <div style="padding: 20px;">
                        <div class="mb-3" style="margin-top: 10px;">
                            <label for="exampleInputEmail1" class="form-label" style="opacity: 0.8;">Tài khoản</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Ex: abc@gmail.com" aria-describedby="emailHelp" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="opacity: 0.8;">Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu của bạn" name="password" id="exampleInputPassword1" required>
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                            <label class="form-check-label" for="exampleCheck1" name="repass" style="opacity: 0.8;">Ghi nhớ tài khoản</label>
                        </div> -->
                        <div class="btnn" style="margin-top: 10px;">
                            <a type="btn" class="btn btn-dark" href="./home" style="width: 120px; border-radius: 10px; background-color: #f2a6c4; color: black; border: none ;">Quay lại</a>
                            <button type="submit" class="btn btn-dark" style="margin-left: 10px; border-radius: 10px; width: 120px;  background-color: #f2a6c4; color: black; border: none;">Đăng Nhập</button>
                        </div>
                    </div>
                </form>
                <form method="POST" id="f2" action="login/Check">
                    <div style="padding: 20px;">
                        <div class="mb-3" style="margin-top: 10px;">
                            <label for="exampleInputEmail1" class="form-label" style="opacity: 0.8;">Tài Khoản</label>
                            <input type="email" class="form-control" name="re_email" id="exampleInputEmail1" placeholder="Ex: abc@gmail.com" aria-describedby="emailHelp" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="opacity: 0.8;">Mật Khẩu</label>
                            <input type="password" class="form-control" name="re_password" placeholder="Nhập mật khẩu của bạn" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="opacity: 0.8;">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="re_repass" placeholder="Xác nhận mật khẩu của bạn" id="exampleInputPassword1" required>
                        </div>
                        <div class="btnn" style="margin-top: 10px;">
                            <a type="btn" class="btn btn-dark" href="./home" style="width: 120px; border-radius: 10px; background-color: #f2a6c4; color: black; border: none ;">Quay lại</a>
                            <button type="submit" class="btn btn-dark" style="margin-left: 10px; border-radius: 10px; width: 120px;  background-color: #f2a6c4; color: black; border: none;">Đăng Ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        btn1 = document.getElementById('dn');
        btn2 = document.getElementById('dk');
        // btn3 = document.getElementById('dn2');
        // btn4 = document.getElementById('dk2');
        form1 = document.getElementById('f1');
        form2 = document.getElementById('f2');

        function changeColor(button) {
            const buttons = document.querySelectorAll('.custom-button');

            buttons.forEach(btn => {
                btn.classList.remove('clicked');
            });

            button.classList.add('clicked');
        }
        changeColor(document.querySelector('.custom-button'));
        btn1.addEventListener('click', function() {
            form1.style.display = 'block';
            form2.style.display = 'none';
        })
        btn2.addEventListener('click', function() {
            form1.style.display = 'none';
            form2.style.display = 'block';
        })
        btn3.addEventListener('click', function() {
            form1.style.display = 'block';
            form2.style.display = 'none';
        })
        btn4.addEventListener('click', function() {
            form1.style.display = 'none';
            form2.style.display = 'block';
        })
    </script>
</body>

</html>