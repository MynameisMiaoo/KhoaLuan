<?php
class search extends controller
{
    function SayHi()
    {
        $this->view(
            "main",
            [
                "page" => "psearch",
                "text" => $_POST['ct_search']
            ]
        );
    }
}
