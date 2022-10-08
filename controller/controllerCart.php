<?php

$cartAction = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['cart'])) ? $_POST['cart'] : null;
$item = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['item'])) ? $_POST['item'] : null;

$index = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['index'])) ? $_GET['index'] : null;
$quantity = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['quantity'])) ? $_GET['quantity'] : null;

@define("URL", "http://localhost/projects/backPHP");
if (isset($_SESSION['cart'])) {
    $listCard = $_SESSION['cart'];
}
else {
    $listCard = [];
}

$cart = new Cart();

if ($cartAction === 'add') {
    $cart->addItemToList($item);
    header(sprintf('Location: %s/?page=initial', constant("URL")));
}
if ($cartAction === 'confirm') {
    $cart->confirmBuy();
    header(sprintf('Location: %s/?page=initial', constant("URL")));
}
if ($index != null) {
    $cart->updateQuantityItem($index, $quantity);
    header(sprintf('Location: %s/?page=initial', constant("URL")));
}