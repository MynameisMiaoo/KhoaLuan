<?php
class Cart extends controller
{
    function SayHi()
    {
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=[];
        }
        $md2= $this->model("cate_model");
        $this->view("main", [
            "page" => "Cart",
            "cate" => $md2->GetList()
        ]);
    }
}
