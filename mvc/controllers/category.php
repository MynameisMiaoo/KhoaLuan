<?php
class category extends controller
{
    function SayHi()
    {
        $this->view("main", ["page" => "phome"]);
    }
    function Adidas()
    {
        $sort="";
        $min="";
        $max = "";
        if(isset($_POST['sort_price'])){
            $sort= $_POST['sort_price'];
        }
        if(isset($_POST['minprice'])){
            $min= $_POST['minprice'];
        }
        if(isset($_POST['maxprice'])){
            $max= $_POST['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Adidas",$sort,$min,$max),
        ]);
    }
    function NIKE()
    {
        $sort="";
        $min="";
        $max ="";
        if(isset($_GET['sort_price'])){
            $sort= $_GET['sort_price'];
        }
        if(isset($_GET['minprice'])){
            $min= $_GET['minprice'];
        }
        if(isset($_GET['maxprice'])){
            $max= $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Nike",$sort,$min,$max)
        ]);
    }
    function JORDAN()
    {
        $sort="";
        $min="";
        $max = "";
        if(isset($_GET['sort_price'])){
            $sort= $_GET['sort_price'];
        }
        if(isset($_GET['minprice'])){
            $min= $_GET['minprice'];
        }
        if(isset($_GET['maxprice'])){
            $max= $_GET['maxprice'];
        }
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "data" => $md->GetProduct("Jordan",$sort,$min,$max)
        ]);
    }
    function Adidas_Detail($a)
    {
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotId("adidas",$a),
            "idproduct" =>$a
        ]);
    }
    function Nike_Detail($a)
    {
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotID("Nike",$a),
            "idproduct" =>$a
        ]);
    }
    function Jordan_Detail($a)
    {
        unset($_SESSION['form']);
        $md = $this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a),
            "data2" => $md->GetProductNotId("Jordan",$a),
            "idproduct" =>$a
        ]);
    }
}
