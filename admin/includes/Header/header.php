<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/assets/css/reset.css">
    <link rel="stylesheet" href="/admin/assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'create-book-table':
                echo '<link rel="stylesheet" href="/admin/assets/css/create-book-table.css">';
                break;
            case 'type-food':
            case 'edit-type-food':
            case 'food':
                echo '<link rel="stylesheet" href="/admin/assets/css/type-food.css">';
                break;
            case 'list-type-food':
            case 'delete-list-type':
            case 'update-type-food':
                echo '<link rel="stylesheet" href="/admin/assets/css/list-type-food.css">';
                break;
            default:
                echo '<link rel="stylesheet" href="/admin/assets/css/type-food.css">';
                break;
        }
    } else {
        // echo '<link rel="stylesheet" href="/admin/assets/css/type-food.css">';
    }
    ?>
</head>
<div class="main__content">
    <aside class="aside">
        <!-- Aside Logo -->
        <img src="/imgs/logo-nexanews.png" alt="" class="aside__logo">
        <!-- Aside Avatar -->
        <div class="aside__group-avatar">
            <img src="https://source.unsplash.com/random" alt="" class="aside__avatar">
            <div class="aside__group-right">
                <p class="aside__text">Hello,</p>
                <p class="aside__name">LeVanHieu</p>
            </div>
        </div>
        <!-- Aside List -->
        <ul class="aside__list">
            <li class="aside__item">
                <a href="/admin/?act=type-food" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-plate-wheat"></i>
                    </div>
                    Loại Món
                </a>
            </li>
            <li class="aside__item">
                <a href="/admin/?act=food" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>
                    Món Ăn
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </div>
                    Bàn
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    Danh Sách Đặt
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    Khách Hàng
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-comment"></i>
                    </div>
                    Bình Luận
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    Thống Kê
                </a>
            </li>
            <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    Thoát
                </a>
            </li>
        </ul>
    </aside>

    <body>