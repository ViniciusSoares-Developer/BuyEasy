<?php
@session_start();
@include_once "../model/connectServer.php";
@include_once "../model/productClass.php";

@define("URL", "http://localhost/buyEasy");

$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitP'])) ? $_POST['submitP'] : null;
$search = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['s'])) ? $_POST['s'] : null;
$id = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['idP'])) ? $_POST['idP'] : 0;
$idP = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['idP'])) ? $_GET['idP'] : 0;

$product = new Product(
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['price'])) ? $_POST['price'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['description'])) ? $_POST['description'] : null
);

switch ($submit) {
    case 'add':
        if ($product->add()) {
            header('Location: ?page=initial');
            die;
        } else {
            header('Location: ?page=add_product&alert=error');
            die;
        }
        break;
    case 'edit':
        if ($_GET['idP']) {
            if ($product->edit($_GET['idP'])) {
                header('Location: ?page=initial');
                die;
            } else {
                header(sprintf('Location: ?page=edit_product&idP=%s&alert=err', $idP));
                die;
            }
        }
        break;
    case 'remove':
        if ($product->remove($id)) {
            header('Location: ?page=initial&alert=successRemove');
            die;
        } else {
            header('Location: ?page=initial&alert=errRemove');
            die;
        }
        break;
    case 'search':
        header(sprintf('Location: ?page=search&s=%s', $search));
        break;
    default:
        if ($page === 'edit_product' && !empty($_SESSION['user']) && $_SESSION['user']['type'] === 2) {
            $userProduct = $product->getProductByIdAndUser($idP, $_SESSION['user']['id']);

            if ($userProduct['id_merchant'] != $_SESSION['user']['id']) {
                header('Location: ?page=initial');
            }
            break;
        } else if ($idP && $idU) {
            $productListOfUser = $product->getProductsByUserWithLimit($idP, $idU);
            $productList = $product->getProductsWithLimit($idP);
            $productListAll = $product->getProducts();
            $product = $product->getProduct($idP);
        } else {
            if ($page === 'search') {
                $productList = $product->getProductsByName($_GET['s']);
                break;
            }
            if ($idU || (isset($_SESSION['user']) && $_SESSION['user']['type'] == '2')) {
                $productList = isset($idU) ? $product->getProductsByUser($idU) : $product->getProductsByUser($_SESSION['user']['id']);
            }
            else {
                $productList = $product->getProducts($idP);
            }
        }
}
