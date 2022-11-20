<?php
require "./model/services/ProductService.php";

$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitP'])) ? $_POST['submitP'] : null;
$name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
$image = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null;
$price = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['price'])) ? $_POST['price'] : null;
$description = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['description'])) ? $_POST['description'] : null;
$sellerId = isset($_SESSION['user']) && User::accessSeller() ? intval($_SESSION['user']['id']) : null;

$idProduct = (!empty($_GET['p'])) ? intval($_GET['p']) : null;
$search = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['s'])) ? $_GET['s'] : null;

$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if ($submit) {
    if (isset($name) && preg_match($pattern, $name)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($price) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>\?\\\]/', $price)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($description) && preg_match($pattern, $description)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($search) && preg_match($pattern, $search)) {
        header("Location: ?page=initial&error=text");
    }
}

$product = new Product($name, $image, $price, $description, $sellerId);
$productService = new ProductService($product);


switch ($submit) {
    case 'register':
        if ($productService->register()) {
            header("Location: ?page=initial");
        } else {
            header("Location: ?page=initial&alert=error");
        }
        break;
    case 'edit':
        if ($productService->edit($idProduct))
            header("Location: ?page=initial");
        header("Location: ?page=&alert=");
        break;
    default:
        if ($idProduct) {
            $productList = $productService->getProductById($idProduct)[0];
            $userProductList = $productService->getUserProducts($productList["idUser"]);
            $userNotProductList = $productService->getUserNotProducts($productList["idUser"]);
        } elseif ($search && $page == "search") {
            if (User::accessSeller()) {
                $productList = $productService->search($search);
            }
            else {
                $productList = $productService->search($search);
            }
        } elseif ($idUser) {
            $productList = $productService->getUserProducts($idUser);
        } else {
            $productList = $productService->getAllProductsDESC();
        }
}