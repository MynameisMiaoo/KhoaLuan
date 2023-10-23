<?php
class category extends controller
{
    function SayHi()
    {
        $md3 = $this->model("cate_model");
        $this->view("main", [
            "page" => "home",
            "cate" => $md3->GetList()
        ]);
    }
    function Adidas()
    {
        $md3 = $this->model("cate_model");
        $sort = "";
        $min = "";
        $max = "";
        if (isset($_GET['sort_price'])) {
            $sort = $_GET['sort_price'];
        }
        if (isset($_GET['minprice'])) {
            $min = $_GET['minprice'];
        }
        if (isset($_GET['maxprice'])) {
            $max = $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Adidas", $sort, $min, $max),
            "cate" => $md3->GetList()
        ]);
    }
    function NIKE()
    {
        $md3 = $this->model("cate_model");
        $sort = "";
        $min = "";
        $max = "";
        if (isset($_GET['sort_price'])) {
            $sort = $_GET['sort_price'];
        }
        if (isset($_GET['minprice'])) {
            $min = $_GET['minprice'];
        }
        if (isset($_GET['maxprice'])) {
            $max = $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Nike", $sort, $min, $max),
            "cate" => $md3->GetList()
        ]);
    }
    function JORDAN()
    {
        $sort = "";
        $min = "";
        $max = "";
        if (isset($_GET['sort_price'])) {
            $sort = $_GET['sort_price'];
        }
        if (isset($_GET['minprice'])) {
            $min = $_GET['minprice'];
        }
        if (isset($_GET['maxprice'])) {
            $max = $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Jordan", $sort, $min, $max)
        ]);
    }
    function Adidas_Detail($a)
    {
        $md2 = $this->model("products_detail_model");
        $md3 = $this->model("cate_model");
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotId("adidas", $a),
            "idproduct" => $a,
            "size" => $md2->GetSize($a),
            "color" => $md2->GetColor($a),
            "cate" => $md3->GetList()
        ]);
    }
    function Nike_Detail($a)
    {
        $md2 = $this->model("products_detail_model");
        $md3 = $this->model("cate_model");
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotID("Nike", $a),
            "idproduct" => $a,
            "size" => $md2->GetSize($a),
            "color" => $md2->GetColor($a),
            "cate" => $md3->GetList()
        ]);
    }
    function Jordan_Detail($a)
    {
        $md2 = $this->model("products_detail_model");
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotId("Jordan", $a),
            "idproduct" => $a,
            "size" => $md2->GetSize($a),
            "color" => $md2->GetColor($a)
        ]);
    }
    function type($cateid)
    {
        $md3 = $this->model("cate_model");
        $sort = "";
        $min = "";
        $max = "";
        if (isset($_GET['sort_price'])) {
            $sort = $_GET['sort_price'];
        }
        if (isset($_GET['minprice'])) {
            $min = $_GET['minprice'];
        }
        if (isset($_GET['maxprice'])) {
            $max = $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProductByCateId($cateid, $sort, $min, $max),
            "cate" => $md3->GetList()
        ]);
    }
}
