<?php
class controller{
    //goi models
    function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }
    //goi views
    function view($view,$data=[]){
        require_once "./mvc/views/main/".$view.".php";
    }
}
?>