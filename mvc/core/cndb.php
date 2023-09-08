<?php
   class DB{
    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "db_khoaluan";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
    function chayTruyVanTraVeDL($con, $q)
    {
        $result = mysqli_query($con, $q);
        return $result;
    }

    function chayTruyVanKhongTraVeDL($con, $q)
    {
        $result = mysqli_query($con, $q);
        return $result;
    }
    
    function giaiPhongBoNho ($con, $result)
    {
        try{
            mysqli_close($con);
            mysqli_free_result($result);
        }
        catch (TypeError $e){
        }
    }
   }
?>