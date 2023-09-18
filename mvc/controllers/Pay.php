<?php
class Pay extends controller{
    function SayHi(){
        $this->view("main",[
            "page" => "pay",
            "text" =>"paypage"
        ]);
    }
}
?>