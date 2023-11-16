<?php
// Connect
include('../db/connect.php');
// Pdo
include('../model/pdo.php');
// Dao
include('../model/dao.php');
// Header
include('./includes/Header/header.php');
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'create-book-table':
            include('./pages/book-table/create.php');
            break;
        case 'type-food':
            include('./pages/food/type-food.php');
            break;
        case 'add-type-food':
            if (isset($_POST['add-type-food'])) {
                $tenloai = $_POST['tenloai'];
                addLoaiMon($tenloai);
                $thongbao = 'Thêm Thành Công';
            }
            include('./pages/food/type-food.php');
        case 'list-type-food':
            $rows = getAllLoaiMon();
            include('./pages/food/list-type-food.php');
            break;
        case 'edit-type-food':
            include('./pages/food/edit-type-food.php');
            break;
        case 'update-type-food':
            if (isset($_POST['update-type-food'])) {
                $maloai = $_POST['maloai'];
                $tenloai = $_POST['tenloai'];
                updateLoaiMon($maloai, $tenloai);
            }
            $rows = getAllLoaiMon();
            include('./pages/food/list-type-food.php');
            break;
        case 'delete-list-type':
            if (isset($_GET['ma_loai_mon'])) {
                $maloaimon = $_GET['ma_loai_mon'];
                deleteLoaiMon($maloaimon);
                $rows = getAllLoaiMon();
            }
            include('./pages/food/list-type-food.php');
            break;
        case 'food':
            include('./pages/food/food.php');
            break;
        case 'add-food':
            if (isset($_POST['add-food'])) {
                $maloaimon = $_POST['maloaimon'];
                $tenmon = $_POST['tenmon'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $anh = $_FILES['anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                    addMonAn($maloaimon, $tenmon, $gia, $mota, $anh);
                    $thongbao = 'Them Thanh Cong';
                }
            }
            include('./pages/food/food.php');
            break;
        default:
            include('./pages/home.php');
            break;
    }
} else {
    include('./pages/home.php');
}
echo '</div>';
// Footer
include('./includes/Footer/footer.php');
