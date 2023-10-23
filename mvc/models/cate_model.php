<?php
class cate_model
{
    function GetList(){
        $new = new DB();
        $sql = "Select * from tbl_category";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        return $kq;
    }
}
