<?php
// Connect
include('./db/connect.php');
// Dao
include('./model/dao.php');
// Pdo
include('./model/pdo.php');
// Utils
include('./utils/utils.php');
// Header
include('./client/includes/Header/header.php');
if (!empty($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'about':
            include('./client/pages/gioithieu.php');
            break;
        case 'contact':
            include('./client/pages/contact.php');
            break;
        case 'login':
            include('./client/pages/login.php');
            break;
        case 'register':
            include('./client/pages/register.php');
            break;
        case 'forgot-pass':
            include('./client/pages/forgot-pass.php');
            break;
        case 'menu':
            include('./client/pages/menu.php');
            break;
        case 'confirm':
            include('./client/pages/confirm.php');
            break;
        case 'detail':
            include('./client/pages/detail.php');
            break;
        case 'add-comment':
            if (isset($_POST['add-comment'])) {
                $ma_mon_an = $_POST['ma_mon_an'];
                $noi_dung = $_POST['comment'];
                $ten_kh = $_SESSION['user']['ten_kh'];
                $ma_kh = $_SESSION['user']['ma_kh'];
                $ngay_binh_luan = date('Y-m-d');
                insertBinhLuan($ma_kh, $ma_mon_an, $ten_kh, $noi_dung, $ngay_binh_luan);
                header('Location: /?act=detail&ma_mon_an=' . $ma_mon_an);
            }
            break;
        case 'profile':
            include('./client/pages/profile.php');
            break;
        case 'update-profile':
            if (isset($_POST['update-profile'])) {
                $ma_kh = $_SESSION['user']['ma_kh'];
                $ten_kh = $_POST['full-name'];
                $email = $_POST['email'];
                $so_dt = $_POST['tel'];
                $img = $_FILES['anh']['name'];
                $target_dir = './uploads/';
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                    $_SESSION['user']['img'] = $img;
                    updateKhachHangWithImg($ten_kh, $so_dt, $email, $img, $ma_kh);
                } else {
                    updateKhachHang($ma_kh, $ten_kh, $so_dt, $email);
                }
                $_SESSION['user']['ten_kh'] = $ten_kh;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['so_dt'] = $so_dt;
                header('Location: /?act=profile');
            }
            break;
        case 'list-book-table':
            include('./client/pages/list-book-table.php');
            break;
        case 'change-password':
            include('./client/pages/change-password.php');
            break;
        case 'update-password':
            include('./client/pages/change-password.php');
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
