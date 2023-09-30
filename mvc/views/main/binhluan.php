<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinhLuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row" id="divcomment">
            <!-- <hr class="myhr"> -->
            <div class="col-12">
                <?php
                while ($row = mysqli_fetch_assoc($data['data'])) :
                ?>
                    <div class="comment">
                        <div class="avt">
                            <img src="/KhoaLuan/public/img/avt.jpg" alt="avt" style="width: 50px;">
                            <h6><?php echo $row['email_user'] ?></h6>
                            <h6><?php echo $formatted_time = date("j F Y", strtotime($row['time_up']));?></h6>
                        </div>
                        <div class="content">
                            <h1><?php echo $row['content_comment'] ?></h1>
                        </div>
                        <hr>
                    </div>
                <?php
                endwhile
                ?>
                <div>
                    <div class="form-floating">
                        <form action="" method="post" id="my form">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"></textarea>
                            <?php
                            if (!isset($_SESSION['username'])) {
                                echo '<button type="button" class="btn btn-success" onclick="redirectToLogin()">Dang Nhap De Binh Luan</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-success" name="btn_dang" id="btn_dang">Dang</button>';
                            }
                            ?>
                            <!-- <button type="button" class="btn btn-success" name="btn_dang" id="btn_dang">Dang</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirectToLogin() {
            window.parent.location.href = "/KhoaLuan/Login";
        }
    </script>
</body>

</html>