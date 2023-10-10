<?php
class Cart extends controller
{
    function SayHi()
    {
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=[];
        }
        $this->view("main", [
            "page" => "Cart",
        ]);
    }
}
