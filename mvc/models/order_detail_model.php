<?php
class order_detail_model
{
    function Add($id, $mang)
    {
        $new = new DB();
        for ($i = 0; $i < sizeof($mang); $i++) {
            $idproduct = $mang[$i][1];
            $countproduct = $mang[$i][7];
            $sizeproduct = $mang[$i][8];
            $colorproduct = $mang[$i][9];
            $priceproduct = $mang[$i][2];
            $sql = "Insert Into tbl_orderdetail (id_orderdetail,id_order,id_product,count_product,price_product,id_color,id_size) Values (null,'$id','$idproduct','$countproduct','$priceproduct','$colorproduct','$sizeproduct')";
            $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        }
        $new->giaiPhongBoNho($new->con, $kq);
    }
    function GetList($madh)
    {
        $new = new DB();
        $sql = "SELECT * FROM tbl_orderdetail 
        JOIN tbl_size ON tbl_orderdetail.id_size = tbl_size.id_size
        JOIN tbl_color ON tbl_orderdetail.id_color = tbl_color.id_color
        JOIN tbl_products ON tbl_orderdetail.id_product = tbl_products.id_product
        WHERE id_order = '$madh'";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($kq)) {
            array_push($result, $row);
        }
        return $result;
    }
}
