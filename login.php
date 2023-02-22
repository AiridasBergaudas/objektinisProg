<?php
use eftec\bladeone\BladeOne;
use helper\Admin;
use helper\Blade;

require_once "config.php";
if (isset($_POST['login'])){
    if (Admin::login($_POST['email'], $_POST['password'])!=null){
        header("location:index.php");
        die();
    }else{
        echo "Blogai jungiesi";
    }
}

    if (isset($_GET['logout'])){
        Admin::logout();
    }
    $blade= new Blade(__DIR__."/views", __DIR__."/compile", BladeOne::MODE_DEBUG);
    $blade->run("login");