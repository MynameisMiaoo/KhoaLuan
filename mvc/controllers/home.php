<?php
class home extends controller
{
    function SayHi()
    {
        // session_destroy();
        unset($_SESSION['form']);
        $a = $this->model("product_model");
        $this->view(
            "main",
            [
                "page" => "phome",
                "data" => $a->GetList()
            ]
        );
    }
}
