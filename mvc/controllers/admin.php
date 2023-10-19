<?php
class admin extends controller
{
    function SayHi()
    {
        //kiem tra xem da dang nhap bang tk admin chua
        if (isset($_SESSION['username']) && $_SESSION['username'] == "admin@gmail.com") {
            $md = $this->model("order_model");
            $doanhthu = $md->GetRevenue();
            $count = intval($md->GetCount());
            $pcancel = intval($md->GetCancel());
            $this->view(
                "madmin",
                [
                    "page" => "ad_admin",
                    "revenue" => $doanhthu,
                    "count" => $count,
                    "cancel" => $pcancel
                ],
            );
        } else {
            header("Location: /KhoaLuan/login");
            exit();
        }
        //*******************/
    }
    function ColorSize()
    {
        $color = $this->model("color_model");
        $size = $this->model("size_model");
        $this->view("madmin", [
            "page" => "ad_color_size",
            "color" => $color->GetListColor(),
            "size" => $size ->GetListSize()
        ]);
    }
    function Product($x = null)
    {
        $color = $this->model("color_model");
        $size  = $this->model("size_model");
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $targetDirectory = "public/img/";
        //     $targetFile = $targetDirectory . basename($_FILES["product_image"]["name"]);
        //     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        //     if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
        //         $imagePath = $targetFile;
        //     }
        //     $temp->Insert(
        //         $_POST['nameproduct'],
        //         $_POST['des'],
        //         $_POST['priceproduct'],
        //         $_POST['category'],
        //         $_POST['brand'],
        //         $imagePath,
        //     );
        // }
        // if (isset($_POST['product_id'])) {
        //     $targetDirectory = "public/img/";
        //     $targetFile = $targetDirectory . basename($_FILES["product_image"]["name"]);
        //     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        //     if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
        //         $imagePath = $targetFile;
        //     }
        //     $temp->Update(
        //         $_POST['product_id'],
        //         $_POST['product_name'],
        //         $imagePath,
        //         $_POST['product_description'],
        //         $_POST['product_price'],
        //         $_POST['product_category'],
        //         $_POST['product_brand']
        //     );
        // }
        // if ($x === null) {
        //     $this->view("madmin", [
        //         "page" => "ad_product",
        //         "data" => $temp->GetListFull(),
        //     ]);
        // } else {
        //     $temp->Delete($x);
        $this->view("madmin", [
            "page" => "ad_product",
            "color" => $color->GetListColor(),
            "size" => $size->GetListSize()

        ]);
        // }
    }
    function Order()
    {
        $temp = $this->model("order_model");
        $this->view("madmin", [
            "page" => "ad_order",
            "data" => $temp->GetListByStatus(1),
        ]);
    }
    function Mail()
    {
        $temp = $this->model("email_model");
        $this->view("madmin", [
            "page" => "ad_mail",
            "data" => $temp->GetList()
        ]);
    }
    function DetailProduct()
    {
        $this->view("madmin", [
            "page" => "ad_detail_product"
        ]);
    }
}
