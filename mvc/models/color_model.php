<?php
class color_model
{
    function GetId($mau)
    {
        $new = new DB();
        $query = "Select id_color from tbl_color where color = '$mau'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row['id_color'];
        }
        return $result;
    }
    function GetColor($id)
    {
        $new = new DB();
        $query = "Select color from tbl_color where id_color = '$id' LIMIT 1";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        $row = mysqli_fetch_assoc($kq);
        $result = $row['color'];
        return $result;
    }
}
