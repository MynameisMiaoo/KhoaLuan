<?php
class email_model
{
    function Insert($a)
    {
        $new = new DB();
        if ($this->Check($a)) {
            $query = "Insert into tbl_email (email_id,email) values (null,'$a')";
            $new->chayTruyVanKhongTraVeDL($new->con, $query);
        }
    }
    function Check($a)
    {
        $new = new DB();
        $query = "Select * from tbl_email where email = '$a'";
        $kq = $new->chayTruyVanTraVeDL($new->con, $query);
        if (mysqli_num_rows($kq) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
