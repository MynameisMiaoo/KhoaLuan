<?php
class category extends controller
{
    function SayHi()
    {
        $this->view("main", ["page" => "phome"]);
    }
    function Adidas()
    {
        $md= $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProduct("adidas")
        ]);
    }
    function Adidas_Detail($a)
    {
        unset($_SESSION['form']);
        $md=$this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a)
        ]);
    }
    function Nike_Detail($a)
    {
        unset($_SESSION['form']);
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
        ]);
    }
    function Jordan_Detail($a)
    {
        unset($_SESSION['form']);
        $md=$this->model("product_model");
        $this->view("main", [
            "page" => "detail",
            "text" => "ADIDASPAGE",
            "data" => $md->GetProductById($a)
        ]);
    }
    function NIKE()
    {
        $md= $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "text" => "NIKEPAGE",
            "data" => $md->GetProduct("Nike")

        ]);
    }
    function JORDAN()
    {
        $md= $this->model("product_model");
        $this->view("main", [
            "page" => "pproduct",
            "text" => "JORDANPAGE",
            "data" => $md->GetProduct("Jordan")
        ]);
    }
}
