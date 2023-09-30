<?php
class Search extends controller
{
    function SayHi()
    {
        $md= $this->model("product_model");
        $this->view(
            "main",
            [
                "page" => "psearch",
                "data" =>$md->Search($_POST['ct_search']),
                "ct_search" =>$_POST['ct_search']
            ]
        );
    }
}
