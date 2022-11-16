<?php
require "./model/services/UserService.php";

$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitU'])) ? $_POST['submitU'] : null;
$image = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['image'])) ? $_FILES['image'] : null;
$name = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) ? $_POST['name'] : null;
$number = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['number'])) ? $_POST['number'] : null;
$email = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) ? $_POST['email'] : null;
$whatsapp = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['whatsapp'])) ? $_POST['whatsapp'] : null;
$instagram = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['instagram'])) ? $_POST['instagram'] : null;

$idUser = (!empty($_GET['u'])) ? intval($_GET['u']) : null;

$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if ($submit) {
    if (isset($name) && preg_match($pattern, $name)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($email) && preg_match('/[\'\/~`\!#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/', $email)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($number) && preg_match($pattern, $number)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($whatsapp) && preg_match($pattern, $whatsapp)) {
        header("Location: ?page=initial&error=text");
    }
    if (isset($instagram) && preg_match($pattern, $instagram)) {
        header("Location: ?page=initial&error=text");
    }
}

$user = new User($name, null, $number, $email, $whatsapp, $instagram);
$userService = new UserService($user);

switch ($submit) {
    case 'alterImage':
        if($userService->alterImage($image)) header("Location: ?page=initial");
        else header("Location: ?page=initial&alert=error");
        break;
    case 'alterInformation':
        if($userService->alterInformations()) header("Location: ?page=initial");
        else header("Location: ?page=initial&alert=error");
        break;
    default:
        if ($idUser) {
            $user = $userService->getUserById($idUser)[0];
        }
        else {
            $userList = $userService->getLast6UsersRegister();
        }
}