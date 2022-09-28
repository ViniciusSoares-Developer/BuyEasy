<?php
session_start();

define("URL", "http://localhost/projects/backPHP");

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
    include_once "./view/register.php";
}
else if ($page === 'edit' && !isset($_SESSION['user'])) {
    include_once "./view/edit_user.php";
}

//user logged
else if ($page === 'user' && isset($_SESSION['user'])) {
    include_once './view/userView.php';
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
