<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ajax_comment.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="height: auto;">
        <div class="row" id="divcomment">
            <!-- <hr class="myhr"> -->
            <div class="col-12">
                <?php
                while ($row = mysqli_fetch_assoc($data['data'])) :
                ?>
                    <div class="comment">
                        <div class="avt">
                            <img src="/KhoaLuan/public/img/avt.jpg" alt="avt" style="width: 50px;">
                            <div class="time">
                                <h6>Người đăng: <?php echo $row['user_name'] ?></h6>
                                <h6><?php echo $formatted_time = date("j F Y", strtotime($row['time_up'])); ?></h6>
                            </div>
                        </div>
                        <div class="content">
                            <div style="align-items: center; display: flex;">
                                <span>Nội dung:</span>
                            </div>
                            <div>
                                <h1><?php echo $row['content_comment'] ?></h1>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile
                ?>
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