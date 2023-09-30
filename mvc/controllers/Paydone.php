<?php
class PayDone extends controller
{
    function SayHi()
    {
        $mess = "false";
        $x= explode("?", $_SERVER['REQUEST_URI']);
        parse_str($x[1], $result);
        if($result['message'] =='Successful.'){
            $mess="true";
            unset($_SESSION['cart']);
            //insert db
        }
        $this->view("main", [
            "page" => "ppaydone",
            "text" => $mess
        ]);
    }
}
