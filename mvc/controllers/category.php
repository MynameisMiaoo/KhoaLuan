<?php
class category extends controller
{
    function SayHi()
    {
        $this->view("main", ["page" => "phome"]);
    }
    function Adidas()
    {
        $this->view("main", [
            "page" => "pproduct",
            "text" => "ADIDASPAGE",
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
        $this->view("main", [
            "page" => "pproduct",
            "text" => "NIKEPAGE"
        ]);
    }
    function JORDAN()
    {
        $this->view("main", [
            "page" => "pproduct",
            "text" => "JORDANPAGE"
        ]);
    }
}
