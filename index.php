<?php
use helper\Admin;
use models\Companys;
use models\Customers;
use models\Contact_info;
use eftec\bladeone\BladeOne;

require_once "config.php";
Admin::loginVerify();


if (isset($_GET['delete'])){
    Companys::get($_GET['delete'])->delete();
    header("location: index.php");
    die();
}



$blade=new BladeOne(__DIR__."/views", __DIR__."/compile", BladeOne::MODE_DEBUG);
echo $blade->run("index");


