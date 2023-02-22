<?php

use eftec\bladeone\BladeOne;
use models\Companys;
use models\Customers;
require_once "config.php";


$id=$_GET['id'];
$category=Customers::all($id);
//print_r($category);
$blade=new BladeOne( __DIR__."/views",__DIR__."/compile",BladeOne::MODE_DEBUG );
echo $blade->run("companys",[
    "category"=>$category,
    "companys"=> Companys::get($id)
]);