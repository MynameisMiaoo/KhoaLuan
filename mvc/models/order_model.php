<?php
class order_model
{
    function Add($madh, $id, $ten, $dc, $sdt, $emai, $tong, $type, $status)
    {
        $new = new DB();
        $sql = "INSERT INTO `tbl_order` (id_oder, id_user, name_user, address, phone, email, total, orderdate, type_pay, status) VALUES ('$madh', '$id', '$ten', '$dc', '$sdt', '$emai', '$tong', NOW(), '$type', '$status')";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $new->giaiPhongBoNho($new->con, $kq);
    }
    function GetList($id)
    {
        $new = new DB();
        $sql = "Select * from tbl_order where id_user = '$id'";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $kqkq = array();
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = array();
            array_push($result, $row['id_oder']);
            array_push($result, $row['orderdate']);
            array_push($kqkq, $result);
        }
        $new->giaiPhongBoNho($new->con, $kq);
        return $kqkq;
    }
    function GetByorderId($id)
    {
        $new = new DB();
        $sql = "Select * from tbl_order 
        join tbl_status on tbl_order.status = tbl_status.id_status
        where id_oder = '$id'";
        $result = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    function GetListByStatus($st1)
    {
        $new = new DB();
        $sql = "Select * from tbl_order
        join tbl_status on tbl_order.status = tbl_status.id_status 
        where tbl_order.status = '$st1'";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $kqkq = array();
        while ($row = mysqli_fetch_assoc($kq)) {
            array_push($kqkq, $row);
        }
        return $kqkq;
    }
    function CheckStatus($ma)
    {
        $new = new DB();
        $sql = "SELECT * FROM tbl_order WHERE id_oder = '$ma'";
        $result = $new->chayTruyVanTraVeDL($new->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $kq = $row['status'];
        }
        return $kq;
    }
    function ChangeSatus($ma, $status)
    {
        $new = new DB();
        $sql = "UPDATE tbl_order SET status ='$status' WHERE id_oder = '$ma'";
        $new->chayTruyVanKhongTraVeDL($new->con, $sql);
    }
    function GetRevenue()
    {
        $new = new DB();
        $sql = "SELECT \n"

            . "    EXTRACT(MONTH FROM orderdate) AS month,\n"

            . "    EXTRACT(YEAR FROM orderdate) AS year,\n"

            . "    SUM(total) AS revenue\n"

            . "FROM \n"

            . "    tbl_order\n"

            . "WHERE \n"

            . "    EXTRACT(MONTH FROM orderdate) = EXTRACT(MONTH FROM CURRENT_DATE)\n"

            . "    AND EXTRACT(YEAR FROM orderdate) = EXTRACT(YEAR FROM CURRENT_DATE)\n"

            . "GROUP BY \n"

            . "    EXTRACT(MONTH FROM orderdate), EXTRACT(YEAR FROM orderdate)\n"

            . "ORDER BY \n"

            . "    EXTRACT(YEAR FROM orderdate), EXTRACT(MONTH FROM orderdate);";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row['revenue'];
        }
        return $result;
    }
    function GetCount()
    {
        $new = new DB();
        $sql = "SELECT COUNT(*) AS total_rows FROM tbl_order";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row['total_rows'];
        }
        return $result;
    }
    function GetCancel()
    {
        $new = new DB();
        $sql = "SELECT 
        (COUNT(*) / (SELECT COUNT(*) FROM tbl_order)) * 100 AS percentage
        FROM 
        tbl_order
        WHERE 
        status = 4";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        while ($row = mysqli_fetch_assoc($kq)) {
            $result = $row['percentage'];
        }
        return $result;
    }
}
