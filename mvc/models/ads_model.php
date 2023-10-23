<?php
class ads_model
{
    function GetList()
    {
        $new = new DB();
        $sql = "Select * from tbl_ads";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($kq)) {
            array_push($result, $row);
        }
        return $result;
    }
    function Update($id,$src)
    {
        $new = new DB();
        $sql = "UPDATE tbl_ads SET img_ads = '$src' WHERE id_ads = '$id'";
        $new->chayTruyVanKhongTraVeDL($new->con, $sql);
    }
}
