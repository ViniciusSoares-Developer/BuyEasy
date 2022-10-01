<?php
@session_start();
@include_once "../model/connectServer.php";
@include_once "../model/productClass.php";

@define("URL", "http://localhost/projects/backPHP");

$image = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null;
$name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
$price = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['price'])) ? $_POST['price'] : null;
$description = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['description'])) ? $_POST['description'] : null;
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])) ? $_POST['submit'] : null;

$search = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])) ? $_GET['search'] : null;
$idP = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['idP'])) ? $_GET['idP'] : null;

$product = new Product($image, $name, $price, $description);

if ($submit === 'add') {
    if ($product->add()) {header(sprintf('Location: %s/?page=initial', constant("URL")));die;}
    else {header(sprintf('Location: %s/?page=add_product&alert=err', constant("URL")));die;}
}
if ($submit === 'edit' && $idP != null) {
    if ($product->edit($idP)) {header(sprintf('Location: %s/?page=initial', constant("URL")));die;}
    else {header(sprintf('Location: %s/?page=edit_product&idP=%s&alert=err', constant("URL"), $idP));die;}
}
if ($submit === 'remove') {
    $product->remove($idP);
}
if ($submit === 'search') {
    $productList = $product->getProductsByName($search);
    global $productList;
}
else {
    global $idP;
    if ($idP) {
        $productList = $product->getProduct($idP);
    }
    else if ($search) {
        $productList = $product->getProductsByName($search);
    }else {
        $productList = $product->getProducts();
    }
    if ($idU) {
        $productListUser = $product->getProductsByUser($idU);
    }
}

// header(sprintf('Location: %s/?page=initial', constant("URL")));