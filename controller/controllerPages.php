<?php
session_start();

include_once "./model/userClass.php";
include_once "./controller/controllerUser.php";

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';

//load header if user logged or not
if (!($page === 'login' || $page === 'register') && $page != 'error') {
    if (!empty($_SESSION['user'])) {
        include_once "./view/shared/headerLogged.php";
    } else {
        include_once "./view/shared/headerNotLogged.php";
    }
}

//charge pages global
if ($page === 'initial') {
    include_once "./view/initial.php";
}

//user not logged
else if ($page === 'login' && !isset($_SESSION['user'])) {
    include_once "./view/login.php";
} else if ($page === 'register' && !isset($_SESSION['user'])) {
    include_once "./view/register.php";
}

//user logged
else if (isset($_SESSION['user'])) {
    if ($page === 'user') {
        include_once './view/userView.php';
    }
}

else if ($page === 'error') {
    include_once "./view/error.php";
}

//page not found
else {
    header('Location: ./?page=error');
}

//block footer
if (!($page === 'login' || $page === 'register')) {
    include_once "./view/shared/footer.php";
}
