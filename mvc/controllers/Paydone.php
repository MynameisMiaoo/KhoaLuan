<?php

use function PHPSTORM_META\type;

class PayDone extends controller
{
    function SayHi()
    {
        $md = $this->model("order_model");
        $user = $this->model("user_model");
        $md2 = $this->model("order_detail_model");
        $color = $this->model("color_model");
        $size = $this->model("size_model");
        //insert du lieu vao db
        if (isset($_SESSION['type']) && $_SESSION['type'] == "MOMO") {
            if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
                $x = explode("?", $_SERVER['REQUEST_URI']);
                parse_str($x[1], $result);
            }
            if ($result['message'] == 'Successful.') {
                $id = $user->GetId($_SESSION['username']);
                $md->Add($result["orderId"], $id, $_SESSION['ten'], $_SESSION['diachi'], $_SESSION['sdt'], $_SESSION['email'], $_SESSION['tong'] + $_SESSION['ship'] * 30000, 1, 1, $_SESSION['ship']);
                // $md2->Add($result["orderId"], $_SESSION['cart']);
                $arr = array();
                for ($j = 0; $j < sizeof($_SESSION['cart']); $j++) {
                    $sp = array();
                    for ($i = 0; $i < sizeof($_SESSION['cart'][$j]) - 2; $i++) {
                        $sp[$i] = $_SESSION['cart'][$j][$i];
                    }
                    $sp[8] = $size->GetId($_SESSION['cart'][$j][8]);
                    $sp[9] = $color->GetId($_SESSION['cart'][$j][9]);
                    array_push($arr, $sp);
                }
                $md2->Add($result["orderId"], $arr);
                unset($_SESSION['cart']);
                unset($_SESSION['diachi']);
                unset($_SESSION['ten']);
                unset($_SESSION['email']);
                unset($_SESSION['sdt']);
                unset($_SESSION['type']);
                unset($_SESSION['ship']);
            }
        } else {
            if (isset($_SESSION['type']) && $_SESSION['type'] == "COD") {
                $id = $user->GetId($_SESSION['username']);
                $ma = time() . "";
                $md->Add($ma, $id, $_SESSION['ten'], $_SESSION['diachi'], $_SESSION['sdt'], $_SESSION['email'], $_SESSION['tong'] + $_SESSION['ship'] * 30000, 2, 1, $_SESSION['ship']);
                $arr = array();
                for ($j = 0; $j < sizeof($_SESSION['cart']); $j++) {
                    $sp = array();
                    for ($i = 0; $i < sizeof($_SESSION['cart'][$j]) - 2; $i++) {
                        $sp[$i] = $_SESSION['cart'][$j][$i];
                    }
                    $sp[8] = $size->GetId($_SESSION['cart'][$j][8]);
                    $sp[9] = $color->GetId($_SESSION['cart'][$j][9]);
                    array_push($arr, $sp);
                }
                $md2->Add($ma, $arr);
                unset($_SESSION['cart']);
                unset($_SESSION['diachi']);
                unset($_SESSION['ten']);
                unset($_SESSION['email']);
                unset($_SESSION['sdt']);
                unset($_SESSION['type']);
                unset($_SESSION['ship']);
            }
        }
        if (!isset($_SESSION['username'])) {
            header("Location: ../KhoaLuan/login");
            exit();
        }
        //do du lieu ra 
        $this->view("main", [
            "page" => "ppaydone",
            "data" => $md->GetList($user->GetId($_SESSION['username']))
        ]);
    }
}
