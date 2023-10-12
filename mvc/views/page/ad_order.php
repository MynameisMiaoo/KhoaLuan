<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <style>
        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            background-color: yellow;
            cursor: pointer;
        }

        .highlight {
            background-color: cyan;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="padding-top: 10px;">
            <div class="col highlight" onclick="highlight(this)" data-dataid="1">Cho xu ly</div>
            <div class="col " onclick="highlight(this)" data-dataid="2">Dang Giao Hang</div>
            <div class="col " onclick="highlight(this)" data-dataid="3">Da Giao Hang</div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-12" id = "content2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">MA DON HANG</th>
                            <th scope="col">TEN</th>
                            <th scope="col">DIA CHI</th>
                            <th scope="col">SO DIEN THOAI</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">STATUS</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < sizeof($data['data']); $i++) : ?>
                            <tr ondblclick="Get('<?php echo $data['data'][$i]['id_oder']; ?>')">
                                <th scope="row"><?php echo $i + 1 ?></th>
                                <td><?php echo $data['data'][$i]['id_oder'] ?></td>
                                <td><?php echo $data['data'][$i]['name_user'] ?></td>
                                <td><?php echo $data['data'][$i]['address'] ?></td>
                                <td><?php echo $data['data'][$i]['phone'] ?></td>
                                <td><?php echo $data['data'][$i]['total'] ?></td>
                                <td><?php echo $data['data'][$i]['status'] ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function Get(ma) {
            $.ajax({
                url: "/KhoaLuan/ajax/GetOrder",
                method: "POST",
                data: {
                    id_oder: ma
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }
        function highlight(element) {
            var cols = document.getElementsByClassName("col");
            for (var i = 0; i < cols.length; i++) {
                cols[i].classList.remove("highlight");
            }
            element.classList.add("highlight");
            CallAjax(element.getAttribute("data-dataid"));
        }

        function CallAjax(data) {
            $.ajax({
                url: "/KhoaLuan/ajax/Order",
                method: "POST",
                data: {
                    status: data
                },
                success: function(data) {
                    $("#content2").html(data);
                }
            });
        }
    </script>
</body>

</html>