<?php
@session_start();
@include_once '../model/connectServer.php';
@include_once '../model/userClass.php';

$userCookie = (isset($_COOKIE['buyEasy_user']))? $_COOKIE['buyEasy_user'] : '';

//type of input data
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])) ? $_POST['submit'] : null;

//data
$name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
$email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) ? $_POST['email'] : null;
$confirm_email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_email'])) ? $_POST['confirm_email'] : null;
$password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password'])) ? $_POST['password'] : null;
$confirm_password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_password'])) ? $_POST['confirm_password'] : null;

$remember  = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['remember'])) ? $_POST['remember'] : null;

//if logout = true, delete session user
$logout = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['logout'])) ? $_GET['logout'] : false;
if ($_SESSION && $logout == true) {
    unset($_SESSION['user']);
}

if ($submit === 'register') {
    if ($email === $confirm_email) {
        if ($password === $confirm_password) {
            $user = new User($name, $password, $email);
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
    $user = new User($name, $password, $email);
    $_SESSION['user'] = $user->verificationLogin();
    header('Location: ../?page=initial');
}
