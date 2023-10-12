<?php
class products_detail_model
{
    function GetById($a)
    {
        $new = new DB();
        $query = "Select * from tbl_products_detail where id_product = '$a'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetSize($arr)
    {
        $result = [];
        $new = new DB();
        $query = "
        SELECT tbl_size.size
        FROM tbl_products_detail
        JOIN tbl_size ON tbl_products_detail.id_size = tbl_size.id_size
        WHERE tbl_products_detail.id_product = '$arr';
        ";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $this->ADD($result, $row["size"]);
        }
        return $result;
    }
    function GetCount($size, $color, $id)
    {
        $result = 0;
        $new = new DB();
        $query = "SELECT *
        FROM tbl_products_detail
        JOIN tbl_color ON tbl_products_detail.id_color = tbl_color.id_color
        JOIN tbl_size ON tbl_products_detail.id_size = tbl_size.id_size
        WHERE tbl_products_detail.id_product = $id AND tbl_color.color = '$color' AND tbl_size.size = $size";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row["count_product"];
        }
        return $result;
    }
    function GetColor($arr)
    {
        $result = [];
        $new = new DB();
        $query = "
        SELECT tbl_color.color
        FROM tbl_products_detail
        JOIN tbl_color ON tbl_products_detail.id_color = tbl_color.id_color
        WHERE tbl_products_detail.id_product = '$arr';
        ";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $this->ADD($result, $row["color"]);
        }
        return $result;
    }
    function ADD($array, $item)
    {
        if (!in_array($item, $array)) {
            $array[] = $item;
        }
        return $array;
    }
    function GetImg($color, $id)
    {
        $result = "";
        $new = new DB();
        $query = "SELECT *
        FROM tbl_products_detail
        JOIN tbl_color ON tbl_products_detail.id_color = tbl_color.id_color
        WHERE tbl_products_detail.id_product = $id AND tbl_color.color = '$color'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row["img_product"];
        }
        return $result;
    }
    function CheckOut($a)
    {
        $new = new DB();
        for ($i = 0; $i < sizeof($a); $i++) {
            $countProduct = intval($a[$i]['count_product']);
            $idProduct = intval($a[$i]['id_product']);
            $size = intval($a[$i]['id_size']);
            $color = intval($a[$i]['id_color']);
            $sql = "UPDATE tbl_products_detail
                    SET count_product = count_product - $countProduct
                    WHERE id_product = '$idProduct'
                    AND id_size = $size
                    AND id_color = $color";
            $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        }
        $new->giaiPhongBoNho($new->con, $kq);
    }
    function CheckIn($a)
    {
        $new = new DB();
        for ($i = 0; $i < sizeof($a); $i++) {
            $countProduct = intval($a[$i]['count_product']);
            $idProduct = intval($a[$i]['id_product']);
            $size = intval($a[$i]['id_size']);
            $color = intval($a[$i]['id_color']);
            $sql = "UPDATE tbl_products_detail
                    SET count_product = count_product + $countProduct
                    WHERE id_product = '$idProduct'
                    AND id_size = $size
                    AND id_color = $color";
            $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        }
        $new->giaiPhongBoNho($new->con, $kq);
    }
}
