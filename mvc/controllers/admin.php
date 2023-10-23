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
            "size" => $size->GetListSize()
        ]);
    }
    function Cate_Brand()
    {
        $brand = $this->model("brand_model");
        $cate = $this->model("cate_model");
        $this->view("madmin", [
            "page" => "ad_brand_cate",
            "brand" => $brand->GetList(),
            "cate" => $cate->GetList()
        ]);
    }
    function Product($x = null)
    {
        $color = $this->model("color_model");
        $size  = $this->model("size_model");
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
    function InfoSale()
    {
        $md3= $this->model("ads_model");
        $this->view("madmin", [
            "page" => "ad_sale",
            "ads" => $md3->GetList()
        ]);
    }
}
