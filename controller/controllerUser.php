<?php
@session_start();
@include_once '../model/connectServer.php';
@include_once '../model/userClass.php';

@define("URL", "http://localhost/projects/backPHP");

//type of input data
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])) ? $_POST['submit'] : null;

//data
$image = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null;
$name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
$phone = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['phone'])) ? $_POST['phone'] : null;
$merchant = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['merchant'])) ? $_POST['merchant'] : null;
$email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) ? $_POST['email'] : null;
$confirm_email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_email'])) ? $_POST['confirm_email'] : null;
$password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password'])) ? $_POST['password'] : null;
$confirm_password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_password'])) ? $_POST['confirm_password'] : null;

//new Data
$newPassword = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['newPassword'])) ? $_POST['newPassword'] : null;
$confirmNewPassword = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirmNewPassword'])) ? $_POST['confirmNewPassword'] : null;

//if logout = true, delete session user
$logout = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['logout'])) ? $_GET['logout'] : false;
if ($_SESSION && $logout == true) {
    unset($_SESSION['user']);
    session_destroy();
}

$user = new User($name, $password, $email, $merchant, $phone, $image);

if ($submit === 'register') {
    if ($email === $confirm_email) {
        if ($password === $confirm_password) {
            if ($user->register()) {
                header('Location: ../?page=login&alert=successRegister');
            } else {
                header('Location: ../?page=register&alert=errorRegister');
            }
        } else {
            header('Location: ../?page=register&alert=errorPassword');
        }
    } else {
        header('Location: ../?page=register&alert=emailError');
    }
}
if ($submit === 'login') {
    if ($user->login()) header(sprintf('Location: %s/?page=initial', constant("URL")));
    else header(sprintf('Location: %s/?page=login&alert=error', constant("URL")));
}
