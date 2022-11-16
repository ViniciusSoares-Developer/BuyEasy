<?php
require "./model/services/CommenterService.php";

$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitCo'])) ? $_POST['submitCo'] : null;
$text = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commenter'])) ? $_POST['commenter'] : null;
$starQ = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['star_quantity'])) ? intval($_POST['star_quantity']) : 0;

$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if ($submit) {
    if (isset($text) && preg_match($pattern, $text)) {
        header("Location: ?page=initial&error=text");
    }
    if (is_int($starQ)) {
        header("Location: ?page=initial&error=text");
    }
}

$commeter = new Commenter($idProduct, $text, $starQ);
$commeterService = new CommenterService($commeter);

switch ($submit) {
    case 'commenter':
        $commeterService->commenter();
        header('Location: ?page=initial');
        break;
    default:
        if ($idProduct) {
            $commenterList = $commeterService->getCommenterByProduct($idProduct);
        }
}