<?php
class user_model
{
    function Login($email, $pass)
    {
        $new = new DB();
        $query = "select user_pass from tbl_user  where user_name = '$email'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        $row = mysqli_fetch_assoc($kq);
        if (password_verify($pass, $row["user_pass"])) {
            return true;
        } else
            return false;
    }
    function Register($email, $pass)
    {
        $new = new DB();
        $sql = "INSERT INTO `tbl_user` (user_id,user_name,user_pass) VALUES ('NULL','$email', '$pass')";
        $kq = $new->chayTruyVanKhongTraVeDL($new->con, $sql);
        $new->giaiPhongBoNho($new->con, $kq);
    }
    function GetId($email)
    {
        $new = new DB();
        $sql = "Select user_id from tbl_user where user_name='$email'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $sql);
        while($row=mysqli_fetch_assoc($kq)){
            $result=$row['user_id'];
        }
        return $result;
    }
}
