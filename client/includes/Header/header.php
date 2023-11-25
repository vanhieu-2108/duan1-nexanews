<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/client/assets/css/reset.css">
    <link rel="stylesheet" href="/client/assets/css/header.css">
    <link rel="stylesheet" href="/client/assets/css/footer.css">
    <?php
    if (!empty($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'register':
            case 'login':
            case 'forgot-pass':
                echo '<link rel="stylesheet" href="/client/assets/css/login.css">';
                break;
            case 'menu':
                echo '<link rel="stylesheet" href="/client/assets/css/menu.css">';
                break;
            case 'confirm':
                echo '<link rel="stylesheet" href="/client/assets/css/confirm.css">';
                break;
            case 'detail':
                echo '<link rel="stylesheet" href="/client/assets/css/detail.css">';
                break;
            case 'profile':
            case 'list-book-table':
            case 'change-password':
            case 'update-password':
                echo '<link rel="stylesheet" href="/client/assets/css/profile.css">';
                break;
            case 'about':
                echo '<link rel="stylesheet" href="/client/assets/css/gioithieu.css">';
                break;
            case 'contact':
                echo '<link rel="stylesheet" href="/client/assets/css/contact.css">';
                break;
            default:
                echo '<link rel="stylesheet" href="/client/assets/css/home.css">';
                break;
        }
    } else {
        echo '<link rel="stylesheet" href="/client/assets/css/home.css">';
    }
    ?>
    <title>Trang Chủ</title>
</head>
<header class="header">
    <div class="header__inner">
        <!-- Logo -->
        <div class="header__logo">
            <a href="/" style="color: #fff">
                <img src="/imgs/nexa-logo-home.png" alt="" width="100" height="100">
            </a>
        </div>
        <!-- Navigation -->
        <ul class="header__list">
            <li class="header__item">
                <a href="/" class="header__link">
                    Trang Chủ
                </a>
            </li>
            <li class="header__item">
                <a href="/?act=menu" class="header__link">
                    Menu
                </a>
            </li>
            <li class="header__item">
                <a href="/?act=about" class="header__link">
                    Giới Thiệu
                </a>
            </li>
            <li class="header__item">
                <a href="/?act=contact" class="header__link">
                    Liên Hệ
                </a>
            </li>
        </ul>
        <!-- Group Cta -->
        <?php
        if (!isset($_SESSION['user'])) {
            echo '
            <div class="header__ctas">
                <a href="/?act=login" class="header__cta">Đăng Nhập</a>
                <a href="/?act=register" class="header__cta">Đăng Ký</a>
            </div>
            ';
        }
        ?>
        <?php
        if (isset($_SESSION['user'])) {
            $avatar = $_SESSION['user']['img'];
            $name = $_SESSION['user']['ten_kh'];
            $role = $_SESSION['user']['vai_tro'];
            if ($role == 1) {
                $admin = '<a href="/admin/" class="action-link">Trang Quản Trị</a>';
            } else {
                $admin = null;
            }
            echo '
            <div class="group-avatar">
            <img src="uploads/' . $avatar . '" alt="" class="avatar">
            <p class="name-avatar">' . $name . '</p>
            <div class="group-action">
                ' . $admin . '
                <a href="/?act=profile" class="action-link">Tài Khoản</a>
                <a href="/client/pages/logout.php" class="action-link">Đăng Xuất</a>
            </div>
            </div> 
            ';
        }
        ?>

    </div>
</header>

<body>