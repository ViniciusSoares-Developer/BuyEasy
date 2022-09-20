<?php
session_start();

include_once "./model/userClass.php";
include_once "./controller/controllerUser.php";

$_SESSION['user'] = true;

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';

//load header if user logged or not
if (!($page === 'login' || $page === 'register' || $page === 'cproduct') && $page != 'error') {
    if (!empty($_SESSION['user'])) {
        include_once "./view/shared/headerLogged.php";
    } else {
        include_once "./view/shared/headerNotLogged.php";
    }
    include_once "./view/template/basket_offcanvas.php";
}

//charge pages global
if ($page === 'initial') {
    include_once "./view/initial.php";
}

//user not logged
else if ($page === 'login') {
    include_once "./view/login.php";
} else if ($page === 'register') {
    include_once "./view/register.php";
}

//user logged
else if ($page === 'user') {
    include_once './view/userView.php';
}
else if($page === 'cproduct') {
    include_once "./view/create_product.php";
}
else if($page === 'product') {
    include_once "./view/view_product.php";
}
else if($page === 'statics') {
    include_once "./view/statistic.php";
}

//page not found
else if ($page === 'error') {
    include_once "./view/error.php";
}
else {
    header(sprintf('Location: %s/?page=error', constant("url_main")));
}

//block footer
if (!($page === 'login' || $page === 'register' || $page === 'cproduct')) {
    include_once "./view/shared/footer.php";
}
