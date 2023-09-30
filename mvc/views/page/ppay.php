<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="input-group input-group-sm mb-3">
                    <label for="" class="form-label" style="width: 100%;">Họ tên</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label for="" class="form-label" style="width: 100%;">Số điện thoại </label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label for="" class="form-label" style="width: 100%;">Email</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label for="" class="form-label" style="width: 100%;">Địa chỉ nhận hàng </label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Sp</th>
                                <th scope="col">SL</th>
                                <th scope="col">TAM tINH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) :
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i + 1 ?></th>
                                    <td><?php echo $_SESSION['cart'][$i][0] ?></td>
                                    <td><?php echo $_SESSION['cart'][$i][7] ?></td>
                                    <td><?php echo $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][7] ?></td>
                                </tr>
                            <?php
                            endfor; ?>
                            <tr>
                                <th scope="row">Tong</th>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5><?php echo $_SESSION['tong'] ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="/KhoaLuan/Pay" method="post">
                        <button type="submit" name="payUrl">Momo</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <button>Gio Hang</button>
            <button>Hoan Tat Don Hang</button>
        </div>

    </div>
    <!-- <form action="/KhoaLuan/Pay" method="post">
        <button type="submit" name="payUrl">Momo</button>
    </form> -->
</body>

</html>