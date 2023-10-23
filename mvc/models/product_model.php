<?php
class product_model
{
    function GetList($begin, $count)
    {
        $new = new DB();
        $query = "select * from tbl_products
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        where status = 'Hiển thị'
        limit $begin , $count";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetListFull($status)
    {
        $new = new DB();
        $query = "select * from tbl_products
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        where tbl_products.id_status_products = '$status'
        ";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetIdLast()
    {
        $new = new DB();
        $sql = "SELECT * FROM tbl_products ORDER BY id_product DESC LIMIT 1";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        while ($row = mysqli_fetch_assoc($kq)) {
            $id = $row['id_product'];
        }
        return $id;
    }
    function GetProductById($a)
    {
        $new = new DB();
        $query = "select * from tbl_products
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        where status = 'Hiển thị'
        and id_product = " . $a . "";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProductNotId($a, $id)
    {
        $new = new DB();
        $query = "SELECT * FROM tbl_products 
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        WHERE status = 'Hiển thị'
        AND brand LIKE '%" . $a . "%' AND id_product <> '$id';";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    // sort 
    function GetProduct($a, $sort, $min, $max)
    {
        $query = "SELECT * FROM tbl_products 
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        WHERE status = 'Hiển thị'
        AND brand LIKE '%" . $a . "%'";
        // th load va bam loc trang
        if ($max == "" && $min == "") {
            $query .= "";
        }

        // th 1 va ""
        if ($min != "" && $max == "") {
            $query .= "AND price_product > '$min'";
        }
        if ($min == "" && $max != "") {
            $query .= "AND price_product < '$max'";
        }
        if ($min != "" && $max != "") {
            $query .= "AND price_product < '$max' AND price_product > '$min'";
        }
        if ($sort != "") {
            $query .= " ORDER BY price_product $sort";
        }
        $new = new DB();
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function Search($key)
    {
        $a = trim($key);
        $new = new DB();
        $query = "SELECT * FROM tbl_products 
    JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
    JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
    JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
    WHERE status = 'Hiển thị'
    AND (brand LIKE '%" . $a . "%' OR tbl_products.name_product LIKE '%" . $a . "%' OR des_product LIKE '%" . $a . "%' OR tbl_category.cate_product LIKE '%" . $a . "%');";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    function GetProductByCateId($cateid, $sort, $min, $max)
    {
        $query = "SELECT * FROM tbl_products 
        JOIN tbl_brand ON tbl_products.brand_product = tbl_brand.id_brand
        JOIN tbl_category ON tbl_products.cate_id = tbl_category.cate_id
        JOIN tbl_status_products ON tbl_products.id_status_products = tbl_status_products.id_status
        WHERE status = 'Hiển thị'
        AND tbl_products.cate_id = '$cateid'";
        // th load va bam loc trang
        if ($max == "" && $min == "") {
            $query .= "";
        }

        // th 1 va ""
        if ($min != "" && $max == "") {
            $query .= "AND price_product > '$min'";
        }
        if ($min == "" && $max != "") {
            $query .= "AND price_product < '$max'";
        }
        if ($min != "" && $max != "") {
            $query .= "AND price_product < '$max' AND price_product > '$min'";
        }
        if ($sort != "") {
            $query .= " ORDER BY price_product $sort";
        }
        $new = new DB();
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        return $kq;
    }
    //admin
    function Editdata($id, $text, $colum)
    {
        $new = new DB();
        $query = "UPDATE tbl_products SET $colum = '$text' WHERE id_product = '$id'";
        $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }
    function Delete($a, $status)
    {
        $new = new DB();
        $query = "UPDATE  tbl_products SET id_status_products = '$status' WHERE id_product =" . $a . "";
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
        $query = "INSERT INTO tbl_products ( id_product, cate_id,img_product, des_product, price_product,name_product,brand_product,id_status_products) VALUES ('null','$cate','$img','$des','$price','$name','$brand',1)";
        $new->chayTruyVanKhongTraVeDL($new->con, $query);
    }
    //admin
}
