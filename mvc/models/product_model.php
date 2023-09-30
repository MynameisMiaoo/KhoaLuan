<?php
class product_model
{
    function GetList()
    {
        $new = new DB();
        $query = "select * from tbl_products";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProductById($a)
    {
        $new = new DB();
        $query = "select * from tbl_products where id_product = " . $a . "";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProductNotId($a, $id)
    {
        $new = new DB();
        $query = "SELECT * FROM tbl_products WHERE brand_product LIKE '%" . $a . "%' AND id_product <> '$id';";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProduct($a, $sort, $min, $max)
    {
        $query = "SELECT * FROM tbl_products WHERE brand_product LIKE '%" . $a . "%'";
        // th load va bam loc trang
        if($max==""&& $min==""){
            $query.="";
        }

        // th 1 va ""
        if($min!=""&&$max ==""){
            $query.="AND price_product > '$min'";
        }
        if($min==""&&$max!=""){
            $query.="AND price_product < '$max'";
        }
        if($min!=""&&$max!=""){
            $query.="AND price_product < '$max' AND price_product > '$min'";
        }
        if($sort!=""){
            $query.=" ORDER BY price_product $sort";
        }
        $new = new DB();
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }

    function Delete($a)
    {
        $new = new DB();
        $query = "DELETE FROM tbl_products WHERE id_product =" . $a . "";
        $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }
    function Update($id, $name, $img, $des, $price, $cate, $brand)
    {
        $new = new DB();
        $query = "UPDATE tbl_products SET name_product = '$name', cate_id = '$cate' , des_product='$des', price_product='$price',brand_product='$brand', img_product='$img' WHERE id_product = '$id'";
        $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }
    function Insert($name, $des, $price, $cate, $brand, $img)
    {
        $new = new DB();
        $query = "INSERT INTO tbl_products ( id_product, cate_id,img_product, des_product, price_product,name_product,brand_product) VALUES ('null','$cate','$img','$des','$price','$name','$brand')";
        $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }
    function Search($a)
    {
        $new = new DB();
        $query = "SELECT * FROM tbl_products WHERE brand_product LIKE '%" . $a . "%';";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
}
