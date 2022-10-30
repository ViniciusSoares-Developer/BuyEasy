<?php

switch (true) {
    case $page === 'initial':
        if ((!isset($_SESSION['user']) || $_SESSION['user']['type'] == 1)) include_once "./view/user/initial_user.php";
        else include_once "./view/user/seller/initial_merchant.php";
        break;

    case $page === 'termsOfUser':
        include_once "./view/shared/termsOfUser.php";
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

    case $page === 'learning' && User::levelAcess() === 2:
        include_once "./view/user/seller/learningMarketing.php";
        break;

    case $page === 'list_buy':
        include_once "./view/user/buy_list.php";
        break;

    default:
        include_once "./view/notFound.php";
}