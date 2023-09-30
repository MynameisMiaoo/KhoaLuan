<?php
class Cart extends controller
{
    function SayHi()
    {
        if (!isset($_SESSION['form'])) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if (isset($_POST['name_product'])) {
                $check = false;
                $index =0;
                $sp = [$_POST['name_product'], $_POST['id_product'], $_POST['price_product'], $_POST['img_product'], $_POST['des_product'], $_POST['brand_product'], $_POST['cate_id'], $_POST['count']];
                for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                    if ($_SESSION['cart'][$i][1] == $sp[1]) {
                        $check = true;
                        $index=$i;
                        break;
                    }
                }
                if($check){
                    $_SESSION['cart'][$index][7]=$sp[7]+$_SESSION['cart'][$index][7];
                }else{
                    $_SESSION['cart'][]=$sp;
                }
                unset($_SESSION['sl']);
            }
            $_SESSION['form'] = "true";
        }
        $this->view("main", [
            "page" => "Cart",
        ]);
    }
    function Delete($a)
    {
        array_splice($_SESSION['cart'], $a, 1);
        header("location: /KhoaLuan/Cart");
    }
}
