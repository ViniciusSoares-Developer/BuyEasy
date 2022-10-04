<?php

$action = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['cart'])) ? $_POST['cart'] : null;
$item = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['item'])) ? $_POST['item'] : null;

@define("URL", "http://localhost/projects/backPHP");
if (isset($_SESSION['cart'])) {
    $listCard = $_SESSION['cart'];
}
else {
    $listCard = [];
}

if ($action === 'add') {
    foreach ($listCard as $index => $value) {
        if ($value['id'] === $item['id']) {
            $listCard[$index]['quant'] += 1;
            break;
        }
        if (count($listCard) - 1 === $index) {
            array_push($listCard, $item);
        }
    }
    if (empty($listCard)) {
        array_push($listCard, $item);
    }
    $_SESSION['cart'] = $listCard;
    header(sprintf('Location: %s/?page=initial', constant("URL")));
}
if ($action === 'confirm') {
    var_dump("confirm"); die;
}