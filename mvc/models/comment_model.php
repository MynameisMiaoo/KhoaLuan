<?php
class comment_model{
    function GetList($a){
        $new = new DB();
        $query = "select * from tbl_comment 
        join tbl_user on tbl_comment.id_user = tbl_user.user_id
        where id_product='$a'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function Add($a,$b,$c){
        $new = new DB();
        $query = "Insert into tbl_comment (id_comment,id_product, id_user, content_comment,time_up) values (null,'$a','$b','$c',NOW())";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }

}
?>