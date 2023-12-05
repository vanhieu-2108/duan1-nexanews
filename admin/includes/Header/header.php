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
            case 'edit-book-table':
            case 'insert-book-table':
            case 'delete-menu':
                echo '<link rel="stylesheet" href="/admin/assets/css/edit-book-table.css">';
                break;
            case 'type-food':
            case 'edit-type-food':
            case 'food':
            case 'edit-food':
                echo '<link rel="stylesheet" href="/admin/assets/css/type-food.css">';
                break;
            case 'list-type-food':
            case 'delete-list-type':
            case 'update-type-food':
            case 'list-food':
            case 'update-food':
            case 'delete-food':
            case 'list-table':
            case 'update-table':
            case 'list-user':
            case 'list-comment':
            case 'detail-comment':
                echo '<link rel="stylesheet" href="/admin/assets/css/list-type-food.css">';
                break;
            case 'book-table':
            case 'update-book-table':
                echo '<link rel="stylesheet" href="/admin/assets/css/list-type-food.css">';
                echo '<link rel="stylesheet" href="/admin/assets/css/book-table.css">';
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
        <img src="/imgs/nexa-logo.jpg" alt="" class="aside__logo">
        <!-- Aside Avatar -->
        <div class="aside__group-avatar">
            <?php

            $anh = $_SESSION['user']['img'];

            ?>
            <img src="/uploads/<?php echo $anh ?>" alt="" class="aside__avatar">
            <div class="aside__group-right">
                <p class="aside__text">Hello,</p>
                <p class="aside__name"><?php echo isset($_SESSION['user']['ten_kh']) ? htmlspecialchars($_SESSION['user']['ten_kh']) : '' ?></p>
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
                <a href="/admin/?act=book-table" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    Danh Sách Đặt Bàn
                </a>
            </li>
            <li class="aside__item">
                <a href="/admin/?act=list-user" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    Người Dùng
                </a>
            </li>
            <li class="aside__item">
                <a href="/admin/?act=list-comment" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-comment"></i>
                    </div>
                    Bình Luận
                </a>
            </li>
            <!-- <li class="aside__item">
                <a href="#!" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    Thống Kê
                </a>
            </li> -->
            <li class="aside__item">
                <a href="/" class="aside__link">
                    <div class="aside__icon">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    Thoát
                </a>
            </li>
        </ul>
    </aside>

    <body>