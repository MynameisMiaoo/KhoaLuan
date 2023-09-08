<?php
class home extends controller{
    function SayHi(){
        $this->view("main",["page" => "phome"]);
    }
}
?>