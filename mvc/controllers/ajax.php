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
    function Email()
    {
        $email = $_POST["email"];
        $md = $this->model("email_model");
        $md->Insert($email);
    }
    function CountProduct(){
        $size = $_POST["size"];
        $color = $_POST["color"];
        $id = $_POST["id"];
        $md = $this->model("products_detail_model");
        $kq=$md->GetCount($size, $color,$id );
        echo json_encode($kq);
    }
    function Img(){
        $color = $_POST["color"];
        $id = $_POST["id"];
        $md = $this->model("products_detail_model");
        $kq=$md->GetImg($color,$id);
        echo json_encode($kq);
    }

}
?>