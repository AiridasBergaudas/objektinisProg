<?php
use models\Companys;
use models\Customers;
use models\Contact_info;

require_once "vendor/autoload.php";

$id=$_GET['id'];
$category=Companys::get($id);

if (isset($_POST['save'])){
    $category=new Companys($_POST['name'], $_POST['address'], $_POST['vat_code'], $_POST['company_name'], $_POST['phone'], $_POST['email'], $id);
    $category->save();
    header("location: index.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kliento atnaujinimas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Klientas</div>
                <div class="card-body">
                    <form method="post" >
                        <div class="mb-2">
                            <label class="form-label">Vardas</label>
                            <input class="form-control" type="text" name="name" value="<?=$category->getName()?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Adresas</label>
                            <input class="form-control" type="text" name="address" value="<?=$category->getAddress()?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Kodas</label>
                            <input class="form-control" type="text" name="vat_code" value="<?=$category->getVatCode()?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Kompanijos vardas</label>
                            <input class="form-control" type="text" name="company_name" value="<?=$category->getCompanyName()?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Telefonas</label>
                            <input class="form-control" type="text" name="phone" value="<?=$category->getPhone()?>">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">E. paštas</label>
                            <input class="form-control" type="text" name="email" value="<?=$category->getEmail()?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="save">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
