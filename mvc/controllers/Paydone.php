<?php
class PayDone extends controller
{
    function SayHi()
    {
        $x= explode("?", $_SERVER['REQUEST_URI']);
        parse_str($x[1], $result);
        $this->view("main", [
            "page" => "ppaydone",
            "text" => $result['amount']
        ]);
    }
}
