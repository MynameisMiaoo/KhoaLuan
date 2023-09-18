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
                $sp = [$_POST['name_product'], $_POST['id_product'], $_POST['price_product'], $_POST['img_product'], $_POST['des_product'], $_POST['brand_product'], $_POST['cate_id']];
                $_SESSION['cart'][] = $sp;
            }
            $_SESSION['form'] = "true";
        }
        $this->view("main", [
            "page" => "Cart",
        ]);
    }
    function Delete($a){
        array_splice($_SESSION['cart'],$a,1);
        header("location: /KhoaLuan/Cart");
    }
}
