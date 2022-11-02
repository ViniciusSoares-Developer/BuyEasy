<?php

$cartAction = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['cart'])) ? $_POST['cart'] : null;
$item = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['item'])) ? $_POST['item'] : null;
$cupom = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['discount'])) ? $_POST['discount'] : null;

$index = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['index'])) ? $_GET['index'] : null;
$quantity = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['quantity'])) ? $_GET['quantity'] : null;

if (isset($_SESSION['cart'])) {
    $listCard = $_SESSION['cart'];
}
else {
    $listCard = [];
}

$cart = new Cart();

switch ($cartAction) {
    case 'add':
        $cart->addItemToList($item);
        header('Location: ?page=initial');
        break;
    case 'confirm':
        $cart->confirmBuy($cupom);
        header('Location: /?page=initial');
        break;
    default:
        if ($index != null)
        {
            $cart->updateQuantityItem($index, $quantity);
            header('Location: /?page=initial');
        }
        else
        {
            $listBuys = $cart->getBuys();
        }
}

// if ($cartAction === 'add') {

// }
// if ($cartAction === 'confirm') {
// }
