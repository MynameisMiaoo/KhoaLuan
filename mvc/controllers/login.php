<?php
// session_start();
class login extends controller
{
    function SayHi() //day la khi user go dia chi se chuyen den trang login
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
        }
        $this->view("mlogin", []);
    }
    //day la ham khi bam submit form thi se goi den action check va kiem tra phan quyen tai day
    function Check()
    {
        if (isset($_POST["email"])) {
            // $_SESSION["username"] = $_POST["email"];
            // $_SESSION["password"] = $_POST["password"];    
            if ($_POST["email"] != "" && $_POST["password"] != "") {
                $login = $this->model("user_model");
                if ($login->Login($_POST["email"], $_POST["password"])) {
                    $_SESSION['username'] = $_POST["email"];
                    if($_POST['email']=='admin@gmail.com'){
                        header("Location: ../admin");
                        exit();
                    }
                    header("Location: ../phome");
                    exit();
                } else {
                    header("Location: ../login");
                    exit();
                }
            } else {
                header("Location: ../login");
                exit();
            }
        } else {
            $register = $this->model("user_model");
            $mh = password_hash($_POST['re_password'], PASSWORD_DEFAULT);
            if ($_POST["re_email"] != "" && $_POST["re_password"] != "" && $_POST["re_repass"] != "") {
                $register->Register($_POST["re_email"], $mh);
                header('Location: ../login');
                exit();
            } else {
                header('Location: ../login');
                exit();
            }
        }
    }
}
//js neu user k nhap hoacj nhap sai  thi hien thong bao 
//xai ajax kiem tra xem user name da ton tai chua
