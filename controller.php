<?php
session_start();

if ($_COOKIE) {
    if (isset($_COOKIE['buyeasy_user_name'])) {
        $_COOKIE['buyeasy_user_name'];
    }
}

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';
$alert = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['alert'])) ? $_GET['alert'] : null;

require_once __DIR__ . "/controller/CAccount.php";
require_once __DIR__ . "/controller/CUser.php";
require_once __DIR__ . "/controller/CProduct.php";
require_once __DIR__ . "/controller/CCart.php";

if (
    $page != 'login'
    && $page != 'register'
    && $page != 'add_product'
    && $page != 'edit_product'
) {
    require_once __DIR__ . "/view/shared/header.php";
}

require_once "./router.php";

if (
    $page != 'login'
    && $page != 'register'
    && $page != 'add_product'
    && $page != 'edit_product'
) {
    require_once __DIR__ . "/view/shared/footer.php";
}