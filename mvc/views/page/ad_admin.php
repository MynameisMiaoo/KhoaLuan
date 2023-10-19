<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ad_admin.css" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="row report">
            <div class="col text-center bg-success report">
                <h5>Doanh Thu Tháng</h5>
                <h4><?php echo number_format($data['revenue'], 0, ',', '.') ?> đ</h4>
                <h6><?php echo date('m') ?> / <?php echo date('Y') ?></h6>
            </div>
            <div class="col text-center bg-info report">
                <h5>Số đơn đặt hàng</h5>
                <h4><?php echo $data['count'] ?></h4>
            </div>
            <div class="col text-center bg-danger report">
                <h5>Tỉ lệ hủy</h5>
                <h4><?php echo $data['cancel'] ?>%</h4>
            </div>
            <div class="col text-center bg-info report">
                <h5>Google Analyitcs</h5>
                <i class="fa-brands fa-google" style="color: #e1ff00;"></i>
                <span>Truy cập ngay</span>
            </div>
        </div>
        <div class="row report" style="min-height: 70vh;">

        </div>
    </div>
</body>

</html>