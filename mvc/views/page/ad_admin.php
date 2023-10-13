<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        .col {
            height: 150px;
            margin: 20px;
            cursor: pointer;
        }

        .row {
            margin-top: 20px;
            background-color: #E0EEEE;
        }

        h5,h4,h6 {
            margin-top: 15px;
        }

        i {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center bg-success">
                <h5>Doanh Thu Tháng</h5>
                <h4><?php echo $data['revenue']?></h4>
                <h6><?php echo date('m')?> / <?php echo date('Y')?></h6>
            </div>
            <div class="col text-center bg-info">
                <h5>Số đơn đặt hàng</h5>
                <h4><?php echo $data['count']?></h4>
            </div>
            <div class="col text-center bg-danger">
                <h5>Tỉ lệ hủy</h5>
                <h4><?php echo $data['cancel']?>%</h4>
            </div>
            <div class="col text-center bg-info">
                <h5>Google Analyitcs</h5>
                <i class="fa-brands fa-google" style="color: #e1ff00;"></i>
                <span>Truy cập ngay</span>
            </div>
        </div>
        <div class="row" style="min-height: 70vh;">

        </div>
    </div>
</body>

</html>