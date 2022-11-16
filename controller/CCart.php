<?php
require "./model/services/CartService.php";

$item = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['item'])) ? $_POST['item'] : null;
$discount = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['discount'])) ? $_POST['discount'] : null;
$submit = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submitC'])) ? $_POST['submitC'] : null;

$index = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['index'])) ? $_GET['index'] : null;
$quantity = ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['quantity'])) ? $_GET['quantity'] : null;

$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>\?\\\]/';
if ($submit) {
    foreach($item as $fields){
        if (preg_match($pattern, $fields)) {
            header("Location: ?page=initial&error=text");
        }
    }
}

$cart = new Cart($discount);
$cartService = new CartService($cart);

switch ($submit) {
    case 'add':
        $cart->addItemToList($item);
        header('Location: ?page=initial');
        break;
    case 'finish':
        $cartService->confirmBuy();
        header('Location: ?page=initial');
        break;
    default:
        if ($index != null) {
            $cart->updatequantityItem($index, $quantity);
            header('Location: ?page=initial');
        } else {
            $listBuys = $cartService->getBuys();
        }
}