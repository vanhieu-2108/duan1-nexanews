<?php
// Header
include('./client/includes/Header/header.php');
if (!empty($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            include('./client/pages/login.php');
            break;
        case 'register':
            include('./client/pages/register.php');
            break;
        case 'menu':
            include('./client/pages/menu.php');
            break;
        default:
            include('./client/pages/home.php');
            break;
    }
} else {
    include('./client/pages/home.php');
}

// Footer
include('./client/includes/Footer/footer.php');
