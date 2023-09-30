<?php
class XuLy extends controller{

    function SayHi(){
        echo "xu ly o day";
        header("Location: /KhoaLuan/home");
        exit();
    }
}
?>