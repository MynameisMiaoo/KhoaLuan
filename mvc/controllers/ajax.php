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
        // $id = $_POST["id"];
        // $image = $_FILES["image"];
        // $colum = $_POST["columname"];
        // $targetDirectory = "public/img/";
        // $targetFile = $targetDirectory . basename($image["name"]);
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        // if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        //     $imagePath = $targetFile;
        // }
        // $temp->Editdata($id, $imagePath, $colum);
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
                 <i class="fa-solid fa-trash" onclick="Xoa(this)"  data-dataid = '.$row["id_product"].' data-bs-toggle="modal" data-bs-target="#exampleModal2"></i> 
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
    function Delete(){
        $id = $_POST["id_product"];
        $temp = $this->model("product_model");
        $temp->Delete($id);
    }
}
