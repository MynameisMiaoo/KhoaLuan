<?php
class size_model
{
    function GetId($size)
    {
        $new = new DB();
        $query = "Select * from tbl_size where size = '$size' ";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row['id_size'];
        }
        return $result;
    }
    function GetSize($id)
    {
        $new = new DB();
        $query = "Select size from tbl_size where id_size = '$id' ";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        $row = mysqli_fetch_assoc($kq);
        $result = $row['size'];
        return $result;
    }
    function GetListSize()
    {
        $new = new DB();
        $query = "Select * from tbl_size";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function Add($size)
    {
        $new = new DB();
        $query = "select * from tbl_size where size='$size'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        if (mysqli_num_rows($kq) == 0) {
            $sql = "Insert into tbl_size (id_size,size) values (null,'$size')";
            $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
            return true;
        } else {
            return false;
        }
    }
}
