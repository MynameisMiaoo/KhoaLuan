<?php
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
            "data" => $data
        ]);
    }
    function Insert()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $temp = $this->model("product_model");
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
        $temp = $this->model("product_model");
        $kq = $temp->GetListFull();
        $output = "";
        while ($row = mysqli_fetch_assoc($kq)) {
            $output .= '
                <tr>
                <th scope="row">' . $row["id_product"] . '</th>
                <td class ="mytdname" data-dataid=' . $row["id_product"] . ' ondblclick="enableEditing(this)">' . $row["name_product"] . '</td>
                <td class = "mytdimg"  data-dataimg=' . $row["id_product"] . ' ondblclick="enableEditing2(this)"><img id ="myimg" style="width: 150px;" src="/KhoaLuan/' . $row['img_product'] . '" alt="' . $row['img_product'] . '"></td>              
                <td class = "mytddes" data-datades=' . $row["id_product"] . ' ondblclick="enableEditing(this)">' . $row["des_product"] . '</td>
                <td class = "mytdprice" data-dataprice=' . $row["id_product"] . ' ondblclick="enableEditing(this)">' . $row["price_product"] . '</td>
                <td class = "mytdcate" data-datacate=' . $row["id_product"] . ' ondblclick="enableEditing(this)">' . $row["cate_id"] . '</td>
                <td class = "mytdbrand" data-databrand=' . $row["id_product"] . ' ondblclick="enableEditing(this)">' . $row["brand_product"] . '</td>
                <td>
                 <i class="fa-solid fa-trash" onclick="Xoa(this)"  data-dataid = ' . $row["id_product"] . ' data-bs-toggle="modal" data-bs-target="#exampleModal2"></i> 
                </td>
                </tr>
            ';
        }
        echo $output;
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
        $temp = $this->model("product_model");
        $temp->Delete($id);
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
            <td>' . $_SESSION['cart'][$i][2] . '</td>
            <td><img style="width: 150px;" src="' . $_SESSION['cart'][$i][3] . '" alt="anh"></td>
            <td>' . $_SESSION['cart'][$i][5] . '</td>
            <td>' . $_SESSION['cart'][$i][7] . '</td>
            <td>' . $_SESSION['cart'][$i][8] . '</td>
            <td>' . $_SESSION['cart'][$i][9] . '</td>
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
            $this->view("history", [
                "data" => $result,
                "info" => $kq
            ]);
        }
    }
    function CM()
    {
        $a = $_POST['id'];
        $md = $this->model("comment_model");
        $this->view("binhluan", [
            "data" => $md->GetList($a),
        ]);
    }
    function ADDCM()
    {
        $a = $_POST['id'];
        $md = $this->model("comment_model");
        $md->Add($a, $_SESSION['username'], $_POST['content']);
    }
}
