<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-2" style="background-color: grey;">
                <h5>Lich su dat hang</h5>
                <hr>
                <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                    <div class="madh" id="iddh" data-dataid="<?php echo $data["data"][$i][0] ?>">
                        <label for="">Ma don hang</label>
                        <h6><?php echo $data["data"][$i][0] ?></h6>
                        <label for="">date</label>
                        <h6><?php echo $data["data"][$i][1] ?></h6>
                        <hr>
                    </div>
                <?php
                endfor;
                ?>
            </div>
            <div class="col-10">
                <div class="row">
                    <div id="content">
                    </div>
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