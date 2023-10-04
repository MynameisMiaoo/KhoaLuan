<?php
class home extends controller
{
    function SayHi()
    {
        if(!isset($_SESSION['sl'])){
            $_SESSION['sl']=1;
        }
        // session_destroy();
        unset($_SESSION['form']);
        $a = $this->model("product_model");
        $this->view(
            "main",
            [
                "page" => "phome",
                "data" => $a->GetList(0,2)
            ]
        );
    }
}
