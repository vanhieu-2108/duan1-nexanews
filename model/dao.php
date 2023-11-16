<?php

function getAllLoaiMon()
{
    $sql = "SELECT * FROM loai_mon";
    return pdo_querys($sql);
}

function addLoaiMon($tenloai)
{
    $sql = "INSERT INTO loai_mon (ten_loai) VALUES (?)";
    return pdo_mutaion($sql, $tenloai);
}


function updateLoaiMon($id, $tenloai)
{
    $sql = "UPDATE loai_mon SET ten_loai = ? WHERE ma_loai_mon = ?";
    return pdo_mutaion($sql, $tenloai, $id);
}

function deleteLoaiMon($id)
{
    $sql = "DELETE FROM loai_mon WHERE ma_loai_mon = ?";
    return pdo_mutaion($sql, $id);
}

function getLoaiMonById($id)
{
    $sql = "SELECT * FROM loai_mon WHERE ma_loai_mon = ?";
    return pdo_query($sql, $id);
}

function getAllMonAn()
{
    $sql = "SELECT * FROM mon_an";
    return pdo_querys($sql);
}
function getMonAnById($id)
{
    $sql = "SELECT * FROM mon_an WHERE ma_mon_an = ?";
    return pdo_query($sql, $id);
}

function addMonAn($maloaimon, $tenmon, $gia, $mota, $img)
{
    $sql = "INSERT INTO mon_an (ma_loai_mon, ten_mon, gia_mon, mo_ta, img) VALUES (?, ?, ?, ?, ?)";
    return  pdo_mutaion($sql, $maloaimon, $tenmon, $gia, $mota, $img);
}

function deleteMonAn($id)
{
    $sql = "DELETE FROM mon_an WHERE id = ?";
    return pdo_mutaion($sql, $id);
}



function getAllKhachHang()
{
    $sql = "SELECT * FROM khach_hang";
    return pdo_querys($sql);
}

function addKhachHang($tenkh, $sdt, $email, $password)
{
    $sql = "INSERT INTO khach_hang (ten_kh, sdt, email, password) VALUES (?, ?, ?, ?)";
    return pdo_mutaion($sql, $tenkh, $sdt, $email, $password);
}

function deleteKhachHang($id)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh = ?";
    return pdo_mutaion($sql, $id);
}

function getKhachHangById($id)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = ?";
    return pdo_query($sql, $id);
}

function insertHoaDon($ma_kh, $ma_dat_ban, $ngay_lap, $tong_tien, $trang_thai)
{
    $sql = "INSERT INTO hoa_don (ma_kh,ma_dat_ban, ngay_lap, tong_tien, trang_thai) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_kh, $ma_dat_ban,  $ngay_lap, $tong_tien, $trang_thai);
}

function updateHoaDon($ma_kh, $trang_thai)
{
    $sql = "UPDATE hoa_don SET trang_thai = ? WHERE ma_kh = ?";
    return pdo_mutaion($sql, $trang_thai, $ma_kh);
}


function insertChiTietHoaDon($ma_hoa_don, $ma_mon_an, $ten_mon, $so_luong, $don_gia)
{
    $sql = "INSERT INTO chi_tiet_hoa_don (ma_hoa_don, ma_mon_an, ten_mon, so_luong, don_gia) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_hoa_don, $ma_mon_an, $ten_mon, $so_luong, $don_gia);
}

function insertBan($so_ban, $trang_thai)
{
    $sql = "INSERT INTO ban (so_ban, trang_thai) VALUES (?, ?)";
    return pdo_mutaion($sql, $so_ban, $trang_thai);
}

function defeleteBan($so_ban)
{
    $sql = "DELETE FROM ban WHERE so_ban = ?";
    return pdo_mutaion($sql, $so_ban);
}

function insertDatBan($ma_ban, $ma_kh, $ngay_dat, $gio, $trang_thai)
{
    $sql = "INSERT INTO dat_ban (ma_ban, ma_kh, ngay_dat, gio, trang_thai) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_ban, $ma_kh, $ngay_dat, $gio, $trang_thai);
}

function insertBinhLuan($ma_kh, $ma_mon_an, $ten_kh, $noi_dung, $ngay_binh_luan)
{
    $sql = "INSERT INTO binh_luan (ma_kh, ma_mon_an, ten_kh, noi_dung, ngay_binh_luan) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_kh, $ma_mon_an, $ten_kh, $noi_dung, $ngay_binh_luan);
}

function deleteBinhLuan($ma_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan = ?";
    return pdo_mutaion($sql, $ma_binh_luan);
}
