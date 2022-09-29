<?php
session_start();

define("URL", "http://localhost/projects/backPHP");

if ($_COOKIE) {
    if (isset($_COOKIE['buyeasy_user_name'])) {
        $_COOKIE['buyeasy_user_name'];
    }
}
// var_dump($_SESSION['user']);

$page = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['page'])) ? $_GET['page'] : 'initial';

include_once "./model/userClass.php";
include_once "./controller/controllerUser.php";

//load header if user logged or not
if ($page != 'login' && $page != 'register') {
    include_once "./view/shared/header.php";
}

//charge pages global
if ($page === 'initial') {
    //page initial
}

//user not logged
else if ($page === 'login' && !isset($_SESSION['user'])) {
    include_once "./view/login_user.php";
}
else if ($page === 'register' && !isset($_SESSION['user'])) {
    include_once "./view/register_user.php";
}
else if ($page === 'edit' && !isset($_SESSION['user'])) {
    include_once "./view/edit_user.php";
}

//user logged
else if ($page === 'user' && isset($_SESSION['user'])) {
    include_once './view/user_view.php';
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
