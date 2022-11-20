<?php
@session_start();
require './model/services/AccountService.php';
include_once "./model/entities/User.php";

//type of input data
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitU'])) ? $_POST['submitU'] : null;

$fields = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) ? $_POST : null;
if ($fields) {
    $fields['name'] = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
    $fields['email'] = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) ? $_POST['email'] : null;
    $fields['password'] = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password'])) ? $_POST['password'] : null;
    $fields['type'] = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['type'])) ? 2 : 1;
}

$passwordVerify = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password_verify'])) ? $_POST['password_verify'] : null;
$remember = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['remember'])) ? true : false;

$logout = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['logout'])) ? $_GET['logout'] : false;

if ($logout) {
    Account::logout();
    header("Location: ?page=initial");
}

$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if ($submit) {
    if (isset($fields['name']) && preg_match($pattern, $fields['name'])) {
        header("Location: ?page=login&error=text");
    }
    if (isset($fields['email']) && preg_match('/[\'\/~`\!#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/', $fields['email'])) {
        header("Location: ?page=login&error=text");
    }
    if (isset($fields['password']) && preg_match($pattern, $fields['password'])) {
        header("Location: ?page=login&error=text");
    }
}

if ($submit) {
    $account = new Account($fields['name'], $fields['email'], $fields['password'], new User($fields['name'], $fields['type']));
    $service = new AccountService($account);
}

switch ($submit) {
    case 'login':
        $service->connectAccount($remember);
        header("Location: ?page=initial");
        break;
    case 'register':
        if ($fields['email'] !== $fields['confirm_email'] || $fields['password'] !== $fields['confirm_password']) {
            header("Location: ?page=register&error=confirm");
            break;
        }
        $service->register();
        header("Location: ?page=initial");
        break;
    case 'editEmail':
        if ($fields['email'] !== $fields['confirm_email']) {
            header("Location: ?page=edit_user&error=confirm");
            break;
        }
        if(!$service->editEmail()) header("Location: ?page=edit_user&error=password");
        header("Location: ?page=initial");
        break;
    case 'editPassword':
        if ($fields['email'] !== $fields['confirm_email']) {
            header("Location: ?page=edit_user&error=confirm");
            break;
        }
        if ($service->editPassword()) header("Location: ?page=edit_user&error=password");
        header("Location: ?page=initial");
        break;
}