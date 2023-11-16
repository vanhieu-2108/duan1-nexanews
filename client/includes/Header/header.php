<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/client/assets/css/reset.css">
    <link rel="stylesheet" href="/client/assets/css/header.css">
    <link rel="stylesheet" href="/client/assets/css/footer.css">
    <?php
    if (!empty($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'register':
            case 'login':
                echo '<link rel="stylesheet" href="/client/assets/css/login.css">';
                break;
            case 'menu':
                echo '<link rel="stylesheet" href="/client/assets/css/menu.css">';
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
                NexaFood
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
                <a href="#!" class="header__link">
                    Giới Thiệu
                </a>
            </li>
            <li class="header__item">
                <a href="#!" class="header__link">
                    Liên Hệ
                </a>
            </li>
        </ul>
        <!-- Group Cta -->
        <div class="header__ctas">
            <a href="/?act=login" class="header__cta">Đăng Nhập</a>
            <a href="/?act=register" class="header__cta">Đăng Ký</a>
        </div>
    </div>
</header>

<body>