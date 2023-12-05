<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 0) {
    // Vai trò không phải admin
    header("Location: /");
    exit(); // Dừng việc thực hiện mã lệnh tiếp theo
} else if (!isset($_SESSION['user'])) {
    // Chưa đăng nhập thì không được vào admin
    header("Location: /");
    exit(); // Dừng việc thực hiện mã lệnh tiếp theo
}
// Connect
include('../db/connect.php');
// Pdo
include('../model/pdo.php');
// Utils
include('../utils/utils.php');
// Dao
include('../model/dao.php');
// Header
include('./includes/Header/header.php');
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
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
        case 'list-food':
            $rows = getAllMonAn('desc');
            include('./pages/food/list-food.php');
            break;
        case 'edit-food':
            include('./pages/food/edit-food.php');
            break;
        case 'update-food':
            if (isset($_POST['update-food'])) {
                $mamonan = $_POST['mamonan'];
                $maloaimon = $_POST['maloaimon'];
                $tenmon = $_POST['tenmon'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $anh = $_FILES['anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                    updateMonAn($mamonan, $maloaimon, $tenmon, $gia, $mota, $anh);
                } else {
                    updateMonAnExcludeImg($mamonan, $maloaimon, $tenmon, $gia, $mota);
                }
                $rows = getAllMonAn('desc');
            }
            include('./pages/food/list-food.php');
            break;
        case 'delete-food':
            if (isset($_GET['ma_mon_an'])) {
                $mamonan = $_GET['ma_mon_an'];
                deleteMonAn($mamonan);
                $rows = getAllMonAn('desc');
            }
            include('./pages/food/list-food.php');
            break;
        case 'book-table':
            include('./pages/book-table/book-table.php');
            break;
        case 'edit-book-table':
            if (isset($_GET['id'])) {
                $row = getDatBanById($_GET['id']);
                if (is_array($row)) {
                    extract($row);
                }
            }
            include('./pages/book-table/edit-book-table.php');
            break;
        case 'delete-menu':
            if (isset($_GET['ma_cthd'])) {
                $ma_dat_ban = $_GET['id'];
                $ma_cthd = $_GET['ma_cthd'];
                $ma_hoa_don = $_GET['ma_hd'];
                deleteChiTietHoaDon($ma_cthd);
                updateSum($ma_hoa_don);
                if (isset($_GET['id'])) {
                    $row = getDatBanById($_GET['id']);
                    if (is_array($row)) {
                        extract($row);
                    }
                }
            }
            include('./pages/book-table/edit-book-table.php');
            break;
        case 'update-book-table':
            if (isset($_POST['update-book-table'])) {
                $ten_kh = $_POST['fullname'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $menuItems = $_POST['name'];
                $countperson = $_POST['countperson'];
                $date = $_POST['date'];
                $hour = $_POST['hour'];
                $status = $_POST['status'];
                $ma_hoa_don = $_POST['mahoadon'];
                $ma_kh = $_POST['ma_kh'];
                $choice_table = $_POST['table'];
                $ma_dat_ban = $_POST['ma_dat_ban'];
                if (isset($ma_kh)) {
                    updateKhachHang($ma_kh, $ten_kh, $tel, $email);
                    updateDatBanById($choice_table, $date, $hour, $countperson, $ma_dat_ban);
                }
                if ($status == 1) {
                    updateTrangThaiHoaDon(1, $ma_hoa_don);
                } else if ($status == 2) {
                    updateTrangThaiHoaDon(2, $ma_hoa_don);
                } else {
                    updateTrangThaiHoaDon(0, $ma_hoa_don);
                }
                $checkMenuArr = getMenuById($ma_hoa_don);
                $filteredItems = filterNonEmptyQuantities($menuItems);
                if (is_array($checkMenuArr)) {
                    foreach ($checkMenuArr as $databaseOrder) {
                        $ma_mon_an = $databaseOrder['ma_mon_an'];
                        $tenmon = $databaseOrder['ten_mon'];
                        $ma_chi_tiet_hoa_don = $databaseOrder['ma_chi_tiet_hoa_don'];
                        if (isset($filteredItems[trim($tenmon)]['ma_mon_an'])) {
                            $so_luong = $filteredItems[trim($tenmon)]['so_luong'];
                            updateChiTietHoaDon($so_luong, $ma_chi_tiet_hoa_don);
                        }
                    }
                }
                $resultArray = [];
                foreach ($filteredItems as $item2) {
                    $found = false;
                    foreach ($checkMenuArr as $item1) {
                        // Giả sử $item2 là một mảng và bạn muốn so sánh với 'ten_mon'
                        if (isset($item1['ten_mon']) && is_array($item2) && in_array($item1['ten_mon'], $item2)) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $resultArray[] = $item2;
                    }
                }
                if (is_array($resultArray) && count($resultArray) > 0) {
                    foreach ($resultArray as $item) {
                        $tenmon = $item['ten_mon'];
                        $so_luong = $item['so_luong'];
                        $ma_mon_an = $item['ma_mon_an'];
                        $gia_mon = $item['gia_mon'];
                        insertChiTietHoaDon($ma_hoa_don, $ma_mon_an, $tenmon, $so_luong, $gia_mon);
                    }
                }
                updateSum($ma_hoa_don);
            }
            include('./pages/book-table/book-table.php');
            break;
        case 'list-user':
            $rows = getAllKhachHang('desc');
            include('./pages/user/list-user.php');
            break;
        case 'edit-user':
            include('./pages/user/edit-user.php');
            break;
        case 'update-user':
            if (isset($_POST['update-user'])) {
                $ma_kh = $_POST['ma_kh'];
                $ten_kh = $_POST['ten_kh'];
                $tel = $_POST['so_dt'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $so_nguoi = $_POST['countperson'];
                $date = $_POST['date'];
                $hour = $_POST['hour'];
                if ($vai_tro == 0 && $_SESSION['user']['ma_kh'] == $ma_kh) {
                    $_SESSION['user']['vai_tro'] = 0;
                    updateUser($ma_kh, $ten_kh, $tel, $email, $vai_tro);
                    header("Location: /");
                    exit();
                }
                updateUser($ma_kh, $ten_kh, $tel, $email, $vai_tro);
                if ($ma_kh == $_SESSION['user']['ma_kh']) {
                    $_SESSION['user']['ten_kh'] = $ten_kh;
                    $_SESSION['user']['so_dt'] = $tel;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['vai_tro'] = $vai_tro;
                }
            }
            header("Location: index.php?act=list-user");
            break;
        case 'list-comment':
            $rows = getListBinhLuan();
            include('./pages/comment/list-comment.php');
            break;
        case 'detail-comment':
            if (isset($_GET['ma_mon_an'])) {
                $rows =  getListDetailBinhLuanById($_GET['ma_mon_an']);
            }
            include('./pages/comment/detail-comment.php');
            break;
        case 'delete-comment':
            if (isset($_GET['ma_binh_luan'])) {
                $ma_binh_luan = $_GET['ma_binh_luan'];
                deleteBinhLuan($ma_binh_luan);
            }
            header("Location: index.php?act=list-comment");
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
