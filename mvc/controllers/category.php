<?php
class category extends controller{
    function SayHi(){
        $this->view("main",["page"=>"phome"]);
    }
    function Adidas(){
        $this->view("main",[
            "page"=>"pproduct",
            "text" => "ADIDASPAGE"
    ]);
    }
    function NIKE(){
        $this->view("main",[
            "page"=>"pproduct",
            "text" => "NIKEPAGE"
    ]);
    }
    function JOKDAN(){
        $this->view("main",[
            "page"=>"pproduct",
            "text" => "JORDANPAGE"
    ]);
    }

}
?>