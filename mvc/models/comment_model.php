<?php
class comment_model{
    function GetList($a){
        $new = new DB();
        $query = "select * from tbl_comment where id_product='$a'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function Add($a,$b,$c){
        $new = new DB();
        $query = "Insert into tbl_comment (id_product, email_user, content_comment,time_up) values ('$a','$b','$c',NOW())";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }

}
?>