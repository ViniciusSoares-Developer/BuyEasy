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

$passwordVerify = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password_verify'])) ? $_POST['password_verify'] : null;
$remember = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['remember'])) ? $_POST['remember'] : null;

//if logout = true, delete session user
$logout = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['logout'])) ? $_GET['logout'] : false;
if ($_SESSION && $logout == true) {
    unset($_SESSION['user']);
    session_destroy();
    header(sprintf('Location: %s/?page=initial', constant("URL")));
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
    if ($user->login()) {
        $data = new DateTime('+1 month', new DateTimeZone('America/Sao_Paulo'));
        if ($remember) {
            setcookie("buyeasy_user_name", $_SESSION['user']['name'], strtotime($data->format('Y-m-d H:i:s')));
            $_COOKIE['buyeasy_user_name'];
        }
        // header(sprintf('Location: %s/?page=initial', constant("URL")));
    }
    else header(sprintf('Location: %s/?page=login&alert=error', constant("URL")));
}
if ($submit === 'editInformation') {
    var_dump($user);die;
    $user->editInfo() ? header(sprintf('Location: %s/?page=initial', constant("URL"))):
    header(sprintf('Location: %s/?page=initial', constant("URL")));
}
if ($submit === 'editEmail') {
    if ($email === $confirm_email) {
        if ($user->verifyAcess($passwordVerify)) {
            if ($user->editEmail()) header(sprintf('Location: %s/?page=initial', constant("URL")));
            else header(sprintf('Location: %s/?page=edit&id=%s&alert=erre', constant("URL"), $_SESSION['user']['id']));
        }
        else header(sprintf('Location: %s/?page=edit&id=%s&alert=errp', constant("URL"), $_SESSION['user']['id']));
    }
    else header(sprintf('Location: %s/?page=edit&id=%s&alert=errc', constant("URL"), $_SESSION['user']['id']));
}
if ($submit === 'editPassword') {
    if ($password === $confirm_password) {
        if ($user->verifyAcess($passwordVerify)) {
            if ($user->editPassword()) header(sprintf('Location: %s/?page=initial', constant("URL")));
            else header(sprintf('Location: %s/?page=edit&id=%s&alert=erre', constant("URL"), $_SESSION['user']['id']));
        }
        else header(sprintf('Location: %s/?page=edit&id=%s&alert=errp', constant("URL"), $_SESSION['user']['id']));
    }
    else header(sprintf('Location: %s/?page=edit&id=%s&alert=errc', constant("URL"), $_SESSION['user']['id']));
}
