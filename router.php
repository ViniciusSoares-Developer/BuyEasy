<?php

switch (true) {
    case $page === 'initial':
        // if (User::accessLogged() && User::accessAdmin())
        if (User::accessLogged() && User::accessSeller()) include_once __DIR__ . "/view/user/seller/initial_merchant.php";
        else include_once __DIR__ . "/view/user/initial.php";
        break;

    case $page === 'termsOfUser':
        include_once "./view/shared/termsOfUser.php";
        break;

    case $page === 'product' && $idProduct:

        include_once "./view/user/product_view.php";
        break;

    case $page === 'user' && $idUser:
        include_once "./view/user/user_view.php";
        break;

    case $page === 'search':
        include_once "./view/user/search_view.php";
        break;

    case $page === 'editu' && User::accessLogged():
        include_once "./view/forms/edit_user.php";
        break;

    case $page === 'addp' && User::accessSeller():
        require_once __DIR__ . "/controller/CProduct.php";
        include_once "./view/forms/register_product.php";
        break;

    case $page === 'editp' && User::accessSeller() && $idProduct:
        include_once "./view/forms/edit_product.php";
        break;

    case $page === 'learning' && User::accessSeller():
        include_once "./view/user/seller/learningMarketing.php";
        break;

    case $page === 'listbuy' && !User::accessSeller():
        include_once "./view/user/buy_list.php";
        break;

    default:
        echo "not found";
}