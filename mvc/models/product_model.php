<?php
class product_model{
    function GetList(){
        $new = new DB();
        $query = "select * from tbl_products";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProductById($a){
        $new = new DB();
        $query="select * from tbl_products where id_product = ".$a."";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProduct($a){
        $new = new DB();
        $query="SELECT * FROM tbl_products WHERE brand_product LIKE '%".$a."%';";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
}
?>