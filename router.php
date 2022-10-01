<?php
session_start();

define("URL", "http://localhost/projects/backPHP");

if ($_COOKIE) {
    if (isset($_COOKIE['buyeasy_user_name'])) {
        $_COOKIE['buyeasy_user_name'];
    }
}

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';

include_once "./model/connectServer.php";

include_once "./model/userClass.php";
include_once "./controller/controllerUser.php";

include_once "./model/productClass.php";
include_once "./controller/controllerProduct.php";

//load header if user logged or not
if ($page != 'login' && $page != 'register') {
    include_once "./view/shared/header.php";
}

//charge pages global
if ($page === 'initial') {
    include_once "./view/initial.php";
}
else if ($page === 'product' && $idP) {
    include_once "./view/product.php";
}
else if ($page === 'search') {
    include_once "./view/search_view.php";
}
else if ($page === 'user' && $idU) {
    include_once './view/user_view.php';
}

//user not logged
else if ($page === 'login' && !isset($_SESSION['user'])) {
    include_once "./view/login_user.php";
}
else if ($page === 'register' && !isset($_SESSION['user'])) {
    include_once "./view/register_user.php";
}

//user logged
else if ($page === 'profile') {
    include_once './view/user_view.php';
}
else if ($page === 'edit_user' && isset($_SESSION['user'])) {
    include_once "./view/edit_user.php";
}
//user logged and merchant true
else if ($page === 'add_product'
        && isset($_SESSION['user'])
        && $_SESSION['user']['merchant']) {
    include_once "./view/register_product.php";
}
else if ($page === 'edit_product'
        && isset($_SESSION['user'])
        && $_SESSION['user']['merchant']
        && $idP) {
    include_once "./view/edit_product.php";
}

else if ($page === 'error') {
    include_once "./view/error.php";
}

//page not found
else {
    header('Location: ./?page=error');
}

//block footer
if ($page != 'login' && $page != 'register') {
    include_once "./view/shared/footer.php";
}
