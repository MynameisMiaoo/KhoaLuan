<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .madh {
            transition: background-color 0.3s ease;
        }

        .madh:hover {
            background-color: #e1e1e2;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-2" style="background-color:#f2f2f2;">
                <div class="nav flex-column">
                    <h4>Danh sách</h4>
                    <hr>
                    <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                        <div style="cursor: pointer; width: 100%;" class="madh" id="iddh" data-dataid="<?php echo $data["data"][$i][0] ?>">
                            <span><?php echo $data['data'][$i][0] ?></span>
                            <p>Ngày đặt: <?php echo $data["data"][$i][1] ?></p>
                        </div>
                        <hr>
                    <?php
                    endfor;
                    ?>
                </div>
            </div>
            <div class="col-10">
                <div class="row"></div>
                <div id="content">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var divElements = document.getElementsByClassName("madh");
            for (var i = 0; i < divElements.length; i++) {
                divElements[i].addEventListener("click", function() {
                    var dataId = this.getAttribute("data-dataid");
                    $.ajax({
                        url: "/KhoaLuan/ajax/History",
                        method: "POST",
                        data: {
                            id: dataId
                        },
                        success: function(data) {
                            $("#content").html(data);
                        }
                    });

                });
            }
        });
    </script>
</body>

</html>