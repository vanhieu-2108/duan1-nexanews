<?php
// // Database
include('../../db/connect.php');
// // Dao
include('../..//model/dao.php');
// // Pdo
include('../../model/pdo.php');
// // Utils
include('../../utils/utils.php');
session_start();
if (isset($_SESSION['menu'])) {
    $order =  $_SESSION['menu'];
    $name = $order['full-name'];
    $email = $order['email'];
    $tel = $order['tel'];
    $date = $order['date'];
    $hour = $order['hour'];
    $choice_table = $order['table'];
    $ma_kh = $_SESSION['user']['ma_kh'];
    $countperson = $order['countperson'];
    $status = 0;
    $menuItems = $order['name'];
    $filteredItems = filterNonEmptyQuantities($menuItems);
    $tong_tien = 0;
    // Chèn Vào Bảng Đặt Bàn
    $ma_dat_ban =  insertDatBan($choice_table, $ma_kh, $date, $hour, $countperson);
    // Chèn Vào Hóa Đơn
    $ma_hoa_don = insertHoaDon($ma_kh, $ma_dat_ban, $date, $tong_tien, $status);
    // Lọc các key có số lượng khác 0 hoặc không rỗng
    $filteredItems = filterNonEmptyQuantities($menuItems);
    // Lặp qua danh sách đã lọc
    $sum = 0;
    if (isset($ma_hoa_don)) {
        foreach ($filteredItems as $tenmon => $item) {
            $so_luong = $item['so_luong'];
            $don_gia = $item['gia_mon'];
            $ma_mon_an = $item['ma_mon_an'];
            $sum += $so_luong * $don_gia;
            insertChiTietHoaDon($ma_hoa_don, $ma_mon_an, $tenmon, $so_luong, $don_gia);
        }
        updateHoaDon($sum, $ma_hoa_don);
        $_SESSION['orderSuccessMessage'] =  "Đặt bàn thành công";
        header("Location: /");
        $_SESSION['menu'] = null;
    }
}
