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
                "data" =>$md->Search(trim($_GET['ct_search'])),
                "ct_search" =>$_GET['ct_search'],
            ]
        );
    }
}
