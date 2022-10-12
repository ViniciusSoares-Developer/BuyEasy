<?php

switch (true) {

    case $page === 'initial':
        if ((!isset($_SESSION['user']) || $_SESSION['user']['type'] === 1)) include_once "./view/user/initial_user.php";
        else include_once "./view/user/seller/initial_merchant.php";
        break;

    case $page === 'product' && $idP:
        include_once "./view/user/product_view.php";
        break;

    case $page === 'user' && $idU:
        include_once "./view/user/user_view.php";
        break;

    case $page === 'search':
        include_once "./view/user/search_view.php";
        break;

    case $page === 'login' && !isset($_SESSION['user']):
        include_once "./view/forms/login_user.php";
        break;

    case $page === 'register' && !isset($_SESSION['user']):
        include_once "./view/forms/register_user.php";
        break;

    case $page === 'edit_user' && User::levelAcess():
        include_once "./view/forms/edit_user.php";
        break;

    case $page === 'add_product' && (User::levelAcess() || User::levelAcess() != 1):
        include_once "./view/forms/register_product.php";
        break;

    case $page === 'edit_product' && User::levelAcess() === 2 && $idP:
        include_once "./view/forms/edit_product.php";
        break;

    default:
        echo "error Not found";
        echo "<br><a href=\"?page=initial\">voltar</a>";
}

// if (
//     $page == 'initial'
//     && (!isset($_SESSION['user'])
//         || !$_SESSION['user']['merchant'])
// ) {
//     include_once "./view/initial_user.php";
// }
// elseif (
//     $page === 'initial'
//     && (isset($_SESSION['user'])
//         || $_SESSION['user']['merchant'])
// ) {
//     include_once "./view/initial_merchant.php";
// }
// elseif ($page === 'product' && $idP) {
//     include_once "./view/product_view.php";
// }
// elseif ($page === 'search') {
//     include_once "./view/search_view.php";
// }
// elseif ($page === 'user' && $idU) {
//     include_once './view/user_view.php';
// }

// //user not logged
// elseif ($page === 'login' && !isset($_SESSION['user'])) {
//     include_once "./view/forms/login_user.php";
// }
// elseif ($page === 'register' && !isset($_SESSION['user'])) {
//     include_once "./view/forms/register_user.php";
// }

// //user logged
// elseif ($page === 'profile') {
//     include_once './view/user_view.php';
// }
// elseif ($page === 'edit_user' && isset($_SESSION['user'])) {
//     include_once "./view/forms/edit_user.php";
// }

// //user logged and merchant true
// elseif (
//     $page === 'add_product'
//     && isset($_SESSION['user'])
//     && $_SESSION['user']['merchant']
// ) {
//     include_once "./view/forms/register_product.php";
// }
// elseif (
//     $page === 'edit_product'
//     && isset($_SESSION['user'])
//     && $_SESSION['user']['merchant']
//     && $idP
// ) {
//     include_once "./view/forms/edit_product.php";
// }

// //page not found
// else {
//     echo "error Not found";
//     echo "<br><a href=\"?page=initial\">voltar</a>";
// }
