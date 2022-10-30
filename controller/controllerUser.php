<?php
@session_start();
@include_once '../model/connectServer.php';
@include_once '../model/userClass.php';

//type of input data
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitU'])) ? $_POST['submitU'] : null;

$email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) ? $_POST['email'] : null;
$confirm_email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_email'])) ? $_POST['confirm_email'] : null;
$password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password'])) ? $_POST['password'] : null;
$confirm_password = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['confirm_password'])) ? $_POST['confirm_password'] : null;

$passwordVerify = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['password_verify'])) ? $_POST['password_verify'] : null;
$remember = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['remember'])) ? $_POST['remember'] : null;
$idU = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['idU'])) ? $_GET['idU'] : null;

$logout = ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['logout'])) ? $_GET['logout'] : false;
if ($_SESSION && $logout == true) {
    unset($_SESSION['user']);
    session_destroy();
    header(sprintf('Location: ?page=initial'));
}

$user = new User(
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null,
    $password,
    $email,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['merchant'])) ? 2 : 1, 
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['phone'])) ? $_POST['phone'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['whatsapp'])) ? $_POST['whatsapp'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['instagram'])) ? $_POST['instagram'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['facebook'])) ? $_POST['facebook'] : null,
    ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null
);

switch ($submit){
    case 'register':
        if ($email === $confirm_email) {
            if ($password === $confirm_password) {
                if ($user->register()) {
                    header(sprintf('Location: ?page=login&alert=sucessR'));
                } else {
                    header(sprintf('Location: ?page=register&alert=error'));
                }
            } else {
                header(sprintf('Location: ?page=register&alert=errorPass'));
            }
        } else {
            header(sprintf('Location: ?page=register&alert=errorEmail'));
        }
        break;

    case 'login':
        if ($user->login()) {
            $data = new DateTime('+1 month', new DateTimeZone('America/Sao_Paulo'));
            if ($remember) {
                setcookie("buyeasy_user_name", $_SESSION['user']['name'], strtotime($data->format('Y-m-d H:i:s')), "/");
                $_COOKIE['buyeasy_user_name'];
            }
            else {
                setcookie("buyeasy_user_name", "", time(), "/");
            }
            header(sprintf('Location: ?page=initial'));
        }
        else header(sprintf('Location: ?page=login&alert=error'));
        break;
    case 'editInformation':
        if ($user->editInfo()){
            $_SESSION['user'] = $user->getUserById($_SESSION['user']['id']);
            header(sprintf('Location: ?page=initial&alert=successEdit'));
        }
        else header(sprintf('Location: ?page=edit_user&alert=errorEdit', $_SESSION['user']['id']));
        break;

    case 'editImage':
        if ($user->editImage()) {
            $_SESSION['user'] = $user->getUserById($_SESSION['user']['id']); 
            header(sprintf('Location: ?page=initial&alert=successEdit'));
        }
        else header(sprintf('Location: ?page=edit_user&alert=errorEdit', $_SESSION['user']['id']));
        break;

    case 'editEmail':
        if ($email === $confirm_email) {
            if ($user->verifyAcess($passwordVerify)) {
                if ($user->editEmail()) header(sprintf('Location: ?page=initial&alert=successEdit'));
                else header(sprintf('Location: ?page=edit_user&alert=errorEdit', $_SESSION['user']['id']));
            }
            else header(sprintf('Location: ?page=edit_user&alert=errorAcess', $_SESSION['user']['id']));
        }
        else header(sprintf('Location: ?page=edit_user&alert=errorEmail', $_SESSION['user']['id']));
        break;

    case 'editPassword':
        if ($password === $confirm_password) {
            if ($user->verifyAcess($passwordVerify)) {
                if ($user->editPassword()) header(sprintf('Location: ?page=initial&alert=successEdit'));
                else header(sprintf('Location: ?page=edit_user&alert=errorEdit', $_SESSION['user']['id']));
            }
            else header(sprintf('Location: ?page=edit_user&alert=errorAcess', $_SESSION['user']['id']));
        }
        else header(sprintf('Location: ?page=edit_user&alert=errorPass', $_SESSION['user']['id']));
        break;

    default :
        if ($idU) {
            $profile = $user->getUserById($idU);
        }
        else {
            $inscribeProfiles = $user->getUsers();
            $recentSeller = $user->getUsersMerchant();
        }
}