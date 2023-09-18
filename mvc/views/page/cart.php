<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .divtb {
            display: flex;
            justify-content: center;
        }

        img {
            width: 20%;
            height: auto;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="divtb">
        <table>
            <tr>
                <td>So Thu Tu</td>
                <td>Name</td>
                <td>Id</td>
                <td>Gia</td>
                <td>Img</td>
                <td>Mo Ta</td>
                <td>Thuong Hieu</td>
                <td>cate_id</td>
            </tr>
            <?php
            $tong = 0;
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) :
            ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $_SESSION['cart'][$i][0]; ?></td>
                    <td><?php echo $_SESSION['cart'][$i][1]; ?></td>
                    <td><?php echo $_SESSION['cart'][$i][2]; ?></td>
                    <td><img src="<?php echo $_SESSION['cart'][$i][3]; ?>" alt="anh"></td>
                    <td><?php echo $_SESSION['cart'][$i][4]; ?></td>
                    <td><?php echo $_SESSION['cart'][$i][5]; ?></td>
                    <td><?php echo $_SESSION['cart'][$i][6]; ?></td>
                    <td><a href="/KhoaLuan/Cart/Delete/<?php echo $i ?>">Xoa</a></td>
                </tr>
                <?php $tong = $tong + $_SESSION['cart'][$i][2] ?>
            <?php
            endfor;
            ?>
        </table>
    </div>
    <div style="display: none;" id="tb">
        <h1>Gio hang trong</h1>
    </div>
    <div>
        <?php
        if ($tong != 0) {
            echo '<h1 class ="abc">' . $tong . '</h1>';
        }
        ?>
    </div>
    <div id="myDivv" class="hidden">
        <a href="/KhoaLuan/Pay" class="btn btn-primary">Thanh Toan</a>
    </div>
    <div> <a href="/KhoaLuan/home" class="btn btn-primary">Tiep Tuc Mua</a></div>
    <script>
        // Kiểm tra biến session
        var sessionVariable = <?php echo count($_SESSION['cart']) > 0 ? 'true' : 'false'; ?>;

        var myDiv = document.getElementById("myDivv");
        var tb = document.getElementById("tb");

        if (sessionVariable) {
            // Thay đổi CSS để hiển thị div
            myDiv.style.display = "block";
        } else {
            // Thay đổi CSS để ẩn div
            myDiv.style.display = "none";
            tb.style.display = "block";
        }
    </script>
</body>

</html>