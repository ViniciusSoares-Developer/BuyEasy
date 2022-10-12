<?php
@session_start();
@include_once "../model/connectServer.php";
@include_once "../model/productClass.php";

@define("URL", "http://localhost/buyEasy");

// $image = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null;
// $name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
// $price = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['price'])) ? $_POST['price'] : null;
// $description = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['description'])) ? $_POST['description'] : null;
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitP'])) ? $_POST['submitP'] : null;

$search = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])) ? $_GET['search'] : null;
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
            header(sprintf('Location: %s/?page=initial', constant("URL")));
            die;
        } else {
            header(sprintf('Location: %s/?page=add_product&alert=err', constant("URL")));
            die;
        }
        break;
    case 'edit':
        if ($idP) {
            if ($product->edit($idP)) {
                header(sprintf('Location: %s/?page=initial', constant("URL")));
                die;
            } else {
                header(sprintf('Location: %s/?page=edit_product&idP=%s&alert=err', constant("URL"), $idP));
                die;
            }
        }
        break;
    case 'search':
        $productList = $product->getProductsByName($search);
        break;
    default:
        if ($idP) {
            global $idP;
            if (
                $page === 'remove'
                && isset($_SESSION['user'])
            ) {
                if ($product->remove($idP)) {
                    header(sprintf('Location: %s/?page=initial&alert=successRemove', constant("URL")));
                    die;
                } else {
                    header(sprintf('Location: %s/?page=initial&alert=errRemove', constant("URL"), $idP));
                    die;
                }
            } else {
                if (isset($_SESSION['user']) and $_SESSION['user']['type'] === 2) {
                    $productListUserID = $product->getProductByIdAndUser($idP, $_SESSION['user']['id']);
                    if (empty($productListUserID)) {
                        header(sprintf('Location: %s/?page=initial', constant("URL")));
                    }
                }
                $productListOfUser = $product->getProductsByUserLimit($idP, $idU);
                $productList = $product->getProducts($idP);
                $product = $product->getProduct($idP);
            }
        }
        else if ($search) {
            $productList = $product->getProductsByName($search);
            global $productList;
        }
        else {
            if (isset($idU) || (isset($_SESSION['user']) and $_SESSION['user']['type'] === 2)) {
                $productListUser = isset($idU) ? $product->getProductsByUser($idU) : $product->getProductsByUser($_SESSION['user']['id']);
            }
            $productList = $product->getProducts($idP);
        }
}

// if ($submit === 'add') {
//     if ($product->add()) {
//         header(sprintf('Location: %s/?page=initial', constant("URL")));
//         die;
//     } else {
//         header(sprintf('Location: %s/?page=add_product&alert=err', constant("URL")));
//         die;
//     }
// }
// if ($submit === 'edit' && $idP != null) {
//     if ($product->edit($idP)) {
//         header(sprintf('Location: %s/?page=initial', constant("URL")));
//         die;
//     } else {
//         header(sprintf('Location: %s/?page=edit_product&idP=%s&alert=err', constant("URL"), $idP));
//         die;
//     }
// }
// if ($submit === 'search') {
//     $productList = $product->getProductsByName($search);
// } else {
//     if ($idP) {
//         global $idP;
//         if (
//             $page === 'remove'
//             && isset($_SESSION['user'])
//         ) {
//             if ($product->remove($idP)) {
//                 header(sprintf('Location: %s/?page=initial&alert=successRemove', constant("URL")));
//                 die;
//             } else {
//                 header(sprintf('Location: %s/?page=initial&alert=errRemove', constant("URL"), $idP));
//                 die;
//             }
//         } else {
//             if (isset($_SESSION['user']) and $_SESSION['user']['type'] === 2) {
//                 $productListUserID = $product->getProductByIdAndUser($idP, $_SESSION['user']['id']);
//                 if (empty($productListUserID)) {
//                     header(sprintf('Location: %s/?page=initial', constant("URL")));
//                 }
//             }
//             $productList = $product->getProducts();
//             $product = $product->getProduct($idP);
//         }
//     } else if ($search) {
//         $productList = $product->getProductsByName($search);
//         global $productList;
//     } else {
//         if (isset($idU) || (isset($_SESSION['user']) and $_SESSION['user']['type'] === 2)) {
//             $productListUser = isset($idU) ? $product->getProductsByUser($idU) : $product->getProductsByUser($_SESSION['user']['id']);
//         }
//         $productList = $product->getProducts();
//     }
// }
