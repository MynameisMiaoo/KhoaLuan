<?php
class brand_model
{
    function GetList(){
        $new = new DB();
        $sql = "Select * from tbl_brand";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        return $kq;
    }
    function Add($brand)
    {
        $new = new DB();
        $query = "select * from tbl_brand where brand='$brand'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        if (mysqli_num_rows($kq) == 0) {
            $sql = "Insert into tbl_brand (id_brand,brand) values (null,'$brand')";
            $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
            return true;
        } else {
            return false;
        }
    }
}