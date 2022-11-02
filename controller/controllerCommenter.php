<?php

$submitCommenter = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commenter-action'])) ? $_POST['commenter-action'] : null;
$text = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commenter'])) ? $_POST['commenter'] : null;
$starQ = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['star_quantity'])) ? $_POST['star_quantity'] : null;
$idP = (!empty($_GET['idP'])) ? $_GET['idP'] : null;

$commeter = new Commenter($text, $idP, $starQ);

if ($submitCommenter == 'commenter'){
    $commeter->commenter();
    header('Location: /?page=initial');
}
else {
    if ($idP) {
        $productCommenters = $commeter->getCommenterByProduct($idP);
    }
    else {
        $feedback = $commeter->getCommenterBySite();
    }
}