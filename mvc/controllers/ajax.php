<?php
class Ajax extends controller
{
    
    const count = 1;
    function SayHi()
    {
        $trang = $_POST["trang"];
        settype($trang, "int");
        $from = ($trang-1)*2;
        $md = $this->model("product_model");
        $data = $md->GetList($from,2);
        $this->view("ajax",[
            "data" => $data
        ]);
    }
}
?>