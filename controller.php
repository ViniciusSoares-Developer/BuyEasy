<?php
session_start();

if ($_COOKIE) {
    if (isset($_COOKIE['buyeasy_user_name'])) {
        $_COOKIE['buyeasy_user_name'];
    }
}

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';
$alert = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['alert'])) ? $_GET['alert'] : null;

include_once "./model/connectServer.php";

include_once "./model/cartClass.php";
include_once "./controller/controllerCart.php";

include_once "./model/userClass.php";
include_once "./controller/controllerUser.php";

include_once "./model/productClass.php";
include_once "./controller/controllerProduct.php";

include_once "./model/commenterClass.php";
include_once "./controller/controllerCommenter.php";

if (
    $page != 'login'
    && $page != 'register'
    && $page != 'add_product'
    && $page != 'edit_product'
) {
    include_once "./view/shared/header.php";
}

require_once "./router.php";

if (
    $page != 'login'
    && $page != 'register'
    && $page != 'add_product'
    && $page != 'edit_product'
) {
    include_once "./view/shared/footer.php";
}