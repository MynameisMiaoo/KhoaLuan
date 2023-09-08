<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/login.css">
    <script src="./KhoaLuan_NVS/public/javascript/login.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row row-form">
            <div class="col-xl-4 col-md-6 col-sm-9 col-form">
                <div class="choose">
                    <button type="button" id="dn">Sign In</button>
                    <button type="button" id="dk">Register</button>
                </div>
                <form method="POST" id="f1" action="login/Check">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Input your email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Input your password" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" name="repass">Remember password</label>
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-dark">Sign In</button>
                    </div>
                </form>
                <form method="POST" id="f2" action="login/Check">
                    <!-- <div class="choose">
                        <button type="button" id="dn2">Sign In</button>
                        <button type="button" id="dk2">Register</button>
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="re_email" id="exampleInputEmail1" placeholder="Input your email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="re_password" placeholder="Input your password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="re_repass" placeholder="Input your password" id="exampleInputPassword1">
                    </div>
                    <div class="btnn">
                        <button type="submit" class="btn btn-dark">Register</button>
                    </div>
                </form>
                <script>
                    btn1 = document.getElementById('dn');
                    btn2 = document.getElementById('dk');
                    // btn3 = document.getElementById('dn2');
                    // btn4 = document.getElementById('dk2');
                    form1 = document.getElementById('f1');
                    form2 = document.getElementById('f2');
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
            </div>
        </div>
    </div>
</body>

</html>