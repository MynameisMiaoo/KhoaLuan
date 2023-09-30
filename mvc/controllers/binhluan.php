<?php
class BinhLuan extends controller
{
    function SayHi()
    {
        //
    }
    function Check($a)
    {
        $md = $this->model("comment_model");
        if (isset($_SESSION['username'])) {
            if (isset($_POST['btn_dang']) && isset($_SESSION['username'])) {
                $md->Add($a, $_SESSION['username'], $_POST['content']);
            }
            $this->view("binhluan", [
                "data" => $md->GetList($a),
            ]);
        } else {
            $this->view("binhluan", [
                "data" => $md->GetList($a),
            ]);
        }
    }
}
