<?php
class cate_model
{
    function GetList(){
        $new = new DB();
        $sql = "Select * from tbl_category";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        return $kq;
    }
    function Add($cate)
    {
        $new = new DB();
        $query = "select * from tbl_category where cate_product='$cate'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        if (mysqli_num_rows($kq) == 0) {
            $sql = "Insert into tbl_category (cate_id,cate_product) values (null,'$cate')";
            $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
            return true;
        } else {
            return false;
        }
    }
}
