<?php
class admin extends controller
{
    function SayHi()
    {
        $this->view("madmin", ["page" => "ad_admin"]);
    }
    function Product($x = null)
    {
        $temp = $this->model("product_model");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDirectory = "public/img/";
            $targetFile = $targetDirectory . basename($_FILES["product_image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
            }
            $temp->Insert(
                $_POST['nameproduct'],
                $_POST['des'],
                $_POST['priceproduct'],
                $_POST['category'],
                $_POST['brand'],
                $imagePath,
            );
        }
        if (isset($_POST['product_id'])) {
            $targetDirectory = "public/img/";
            $targetFile = $targetDirectory . basename($_FILES["product_image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
            }
            $temp->Update(
                $_POST['product_id'],
                $_POST['product_name'],
                $imagePath,
                $_POST['product_description'],
                $_POST['product_price'],
                $_POST['product_category'],
                $_POST['product_brand']
            );
        }
        if ($x === null) {
            $this->view("madmin", [
                "page" => "ad_product",
                "data" => $temp->GetListFull(),
            ]);
        } else {
            $temp->Delete($x);
            $this->view("madmin", [
                "page" => "ad_product",
                "data" => $temp->GetListFull(),
            ]);
        }
    }
}
