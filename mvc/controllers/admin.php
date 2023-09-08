<?php
class admin extends controller{
    function SayHi(){
        $this->view("madmin",["page" => "phome"]);
    }
}
?>