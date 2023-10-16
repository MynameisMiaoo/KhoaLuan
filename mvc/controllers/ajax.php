<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mvc/phpmailer/src/Exception.php';
require 'mvc/phpmailer/src/PHPMailer.php';
require 'mvc/phpmailer/src/SMTP.php';

class Ajax extends controller
{
    const count = 1;
    function SayHi()
    {
        $trang = $_POST["trang"];
        settype($trang, "int");
        $from = ($trang - 1) * 2;
        $md = $this->model("product_model");
        $data = $md->GetList($from, 2);
        $this->view("ajax", [
            "page" => "Load_home",
            "data" => $data
        ]);
    }
    function AddColor()
    {
        $color = $_POST['color'];
        $md = $this->model("color_model");
        $md->Add($color);
    }
    function AddSize()
    {
        $size = $_POST['size'];
        $md = $this->model("size_model");
        $md->Add($size);
    }
    function GetProduct()
    {
        $id = $_POST['idsp'];
        $md = $this->model("product_model");
        $kq = $md->Search($id);
        $this->view("ajax", [
            "page" => "ajax_ad_detail_product",
            "data" => $kq
        ]);
    }
    function Insert()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $color = $_POST['color'];
        $size  = $_POST['size'];
        $count = $_POST['count'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $temp = $this->model("product_model");
        $md = $this->model("products_detail_model");
        $targetDirectory = "public/img/";
        $targetFile = $targetDirectory . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        }
        $temp->Insert(
            $name,
            $description,
            $price,
            $category,
            $brand,
            $imagePath,
        );
        $md->AddDetail( $temp->GetIdLast(), $color, $size, $imagePath, $count);
    }
    function EditImage()
    {
        $temp = $this->model("product_model");
        $id = $_POST["id"];
        $image = $_FILES["image"];
        $colum = $_POST["columname"];
        $targetDirectory = "public/img/";
        $targetFile = $targetDirectory . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        }
        $temp->Editdata($id, $imagePath, $colum);
    }
    function Edit()
    {
        $temp = $this->model("product_model");
        $id = $_POST["idproduct"];
        $text = $_POST["content"];
        $colum = $_POST["columname"];
        $temp->Editdata($id, $text, $colum);
    }
    function Load()
    {
        $status = $_POST['status'];
        $temp = $this->model("product_model");
        $kq = $temp->GetListFull($status);
        $this->view("ajax", [
            "page" => "ajax_ad_product",
            "data" => $kq,
            "status" => $status
        ]);
    }
    function LoadList()
    {
        $status = $_POST['status'];
        $temp = $this->model("product_model");
        $kq = $temp->GetListFull($status);
        $this->view("ajax", [
            "page" => "ajax_ad_detail_product",
            "data" => $kq,
            "status" => $status
        ]);
    }
    function GetDetailProduct()
    {
        $id = $_POST['idsp'];
        $temp = $this->model("products_detail_model");
        $color = $this->model("color_model");
        $size = $this->model("size_model");
        $kq = $temp->GetById($id);
        $this->view("ajax", [
            "page" => "ajax_detail_product",
            "data" => $kq,
            "color" => $color->GetListColor(),
            "size" => $size->GetListSize(),
            "id" => $id
        ]);
    }
    function AddDetailProduct()
    {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $count = $_POST['count'];
        $image = $_FILES["image"];
        $targetDirectory = "public/img/";
        $targetFile = $targetDirectory . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        }
        $md = $this->model("products_detail_model");
        $md->AddDetail($id, $color, $size, $imagePath, $count);
    }
    function Email()
    {
        $email = $_POST["email"];
        $md = $this->model("email_model");
        $md->Insert($email);
    }
    function CountProduct()
    {
        $size = $_POST["size"];
        $color = $_POST["color"];
        $id = $_POST["id"];
        $md = $this->model("products_detail_model");
        $kq = $md->GetCount($size, $color, $id);
        echo json_encode($kq);
    }
    function Img()
    {
        $color = $_POST["color"];
        $id = $_POST["id"];
        $md = $this->model("products_detail_model");
        $kq = $md->GetImg($color, $id);
        echo json_encode($kq);
    }
    function Delete()
    {
        $id = $_POST["id_product"];
        $status = $_POST["status"];
        $temp = $this->model("product_model");
        $temp->Delete($id, $status);
    }
    //cart 
    function Cart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_POST['name_product'])) {
            $check = false;
            $index = 0;
            $sp = [$_POST['name_product'], $_POST['id_product'], $_POST['price_product'], $_POST['img_product'], $_POST['des_product'], $_POST['brand_product'], $_POST['cate_id'], $_POST['count'], $_POST['size_product'], $_POST['color_product']];
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i][1] == $sp[1] && $_SESSION['cart'][$i][8] == $sp[8] && $_SESSION['cart'][$i][9] == $sp[9]) {
                    $check = true;
                    $index = $i;
                    break;
                }
            }
            if ($check) {
                $_SESSION['cart'][$index][7] = $sp[7] + $_SESSION['cart'][$index][7];
                $_SESSION['cart'][$index][8] = $sp[8];
                $_SESSION['cart'][$index][9] = $sp[9];
            } else {
                $_SESSION['cart'][] = $sp;
            }
            unset($_SESSION['sl']);
        }
    }
    function LoadCart()
    {
        $_SESSION['tong'] = 0;
        $output = "";
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $output .= '
            <tr>
            <td>' . $i + 1 . '</td>
            <td>' . $_SESSION['cart'][$i][0] . '</td>
            <td><img style="width: 150px;" src="' . $_SESSION['cart'][$i][3] . '" alt="anh"></td>
            <td>' . $_SESSION['cart'][$i][5] . '</td>
            <td>' . $_SESSION['cart'][$i][7] . '</td>
            <td>' . $_SESSION['cart'][$i][8] . '</td>
            <td>' . $_SESSION['cart'][$i][9] . '</td>
            <td>' . $_SESSION['cart'][$i][2] . '</td>
            <td>
            <i class="fa-solid fa-trash" onclick="Delete(this)" style="color: #d41616;" data-dataid = "' . $i . '"></i>
            </td>
        </tr>
            ';
            $_SESSION['tong'] = $_SESSION['tong'] + $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][7];
        }
        if (sizeof($_SESSION['cart']) == 0) {
            $output .= '
            <tr>
            <td colspan="9">Chưa có sản phẩm trong giỏ hàng của bạn</td>
            </tr>
            ';
        }
        if ($_SESSION['tong'] > 0) {
            $output .= '
                <tr>
                <td>Tổng</td>
                <td colspan="6"></td>
                <td>' . $_SESSION['tong'] . '</td>
                <td></td>
                </tr>
            ';
        }
        $response = array(
            'html' => $output,
            'cartCount' => sizeof($_SESSION['cart']),
            'total' => $_SESSION["tong"]
        );
        echo json_encode($response);
    }
    function DeleteCart()
    {
        array_splice($_SESSION['cart'], $_POST["index"], 1);
    }
    function History()
    {
        if (isset($_SESSION['username'])) {
            $madh = $_POST['id'];
            $md = $this->model("order_detail_model");
            $result = $md->GetList($madh);
            $md2 = $this->model("order_model");
            $kq = $md2->GetByorderId($madh);
            $this->view("ajax", [
                "page" => "ajax_history",
                "data" => $result,
                "info" => $kq
            ]);
        }
    }
    function CM()
    {
        $a = $_POST['id'];
        $md = $this->model("comment_model");
        $this->view("ajax", [
            "page" => "ajax_comment",
            "data" => $md->GetList($a),
        ]);
    }
    function ADDCM()
    {
        $a = $_POST['id'];
        $md = $this->model("comment_model");
        $md->Add($a, $_SESSION['username'], $_POST['content']);
    }
    function Order()
    {
        $status = $_POST['status'];
        $temp = $this->model("order_model");
        $result = $temp->GetListByStatus($status);
        $this->view("ajax", [
            "page" => "ajax_order",
            "data" => $result
        ]);
    }
    function GetOrder()
    {
        $ma = $_POST['id_oder'];
        $temp = $this->model("order_detail_model");
        $md = $this->model("order_model");
        $kq = $md->CheckStatus($ma);
        $result = $temp->GetList($ma);
        $this->view("ajax", [
            "page" => "ajax_order_detail",
            "data" => $result,
            "ma" => $ma,
            "check" => $kq
        ]);
    }
    function XuatKho()
    {
        $ma = intval($_POST['id']);
        //can cap nhap trang thai 
        $md = $this->model("order_model");
        $temp = $this->model("order_detail_model");
        $md2 = $this->model("products_detail_model");
        $md->ChangeSatus($ma, 2);
        //can update so luong 
        //can lay duoc id size color va sl san pham cua don hang luu vao 1 mang 
        $result = $temp->GetList($ma);
        //update
        $md2->CheckOut($result);
    }
    function NhapKho()
    {
        $ma = intval($_POST['id']);
        $md = $this->model("order_model");
        $temp = $this->model("order_detail_model");
        $md2 = $this->model("products_detail_model");
        $md->ChangeSatus($ma, 4);
        $result = $temp->GetList($ma);
        $md2->CheckIn($result);
    }
    function ChangeStatus()
    {
        $ma = intval($_POST['id']);
        $md = $this->model("order_model");
        $md->ChangeSatus($ma, 3);
    }
    function Cancel()
    {
        $ma = $_POST['id'];
        $md = $this->model("order_model");
        $md->ChangeSatus($ma, 4);
    }
    function SendMail()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $temp = $this->model("email_model");
        $arr = $temp->GetList();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $mail = new PHPMailer(true);
            if (filter_var($arr[$i]['email'], FILTER_VALIDATE_EMAIL)) {
                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'minaxinhdep2022@gmail.com';
                    $mail->Password   = 'gpdf uwkc hmae nouf';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->setFrom('minaxinhdep2022@gmail.com', 'Shop');
                    $mail->addAddress($arr[$i]['email'], 'User');
                    // $mail->addAddress('test@hdhwqudhua','Test');               
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                        $image = $_FILES['image'];
                        $targetDirectory = "public/img/";
                        $targetFile = $targetDirectory . basename($image["name"]);
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                            $imagePath = $targetFile;
                        }
                        $mail->addAttachment($imagePath);
                    }
                    $mail->isHTML(true);
                    $mail->Subject = $title;
                    $mail->Body    = $content;
                    $mail->AltBody = '';
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent.";
                }
            }
        }
    }
}
