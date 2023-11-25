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

function getAllMonAn($order = 'asc')
{
    $sql = "SELECT * FROM mon_an inner join loai_mon on mon_an.ma_loai_mon = loai_mon.ma_loai_mon ORDER BY ma_mon_an $order";
    return pdo_querys($sql);
}

function searchMonAnByName($name)
{
    $sql = "SELECT * FROM mon_an inner join loai_mon on mon_an.ma_loai_mon = loai_mon.ma_loai_mon WHERE ten_mon LIKE ?";
    return pdo_querys($sql, '%' . $name . '%');
}

function getMonAnById($id)
{
    $sql = "SELECT * FROM mon_an WHERE ma_mon_an = ?";
    return pdo_query($sql, $id);
}

function getMonAnWithName($ten_mon_an)
{
    $sql = "SELECT * FROM mon_an WHERE ten_mon LIKE ?";
    return pdo_query($sql, '%' . $ten_mon_an . '%');
}



function getMonAnByName($ten_loai)
{
    $sql = "SELECT * FROM mon_an inner join loai_mon on mon_an.ma_loai_mon = loai_mon.ma_loai_mon WHERE ten_loai = ?";
    return pdo_querys($sql, $ten_loai);
}

function addMonAn($maloaimon, $tenmon, $gia, $mota, $img)
{
    $sql = "INSERT INTO mon_an (ma_loai_mon, ten_mon, gia_mon, mo_ta, img) VALUES (?, ?, ?, ?, ?)";
    return  pdo_mutaion($sql, $maloaimon, $tenmon, $gia, $mota, $img);
}

function deleteMonAn($id)
{
    $sql = "DELETE FROM mon_an WHERE ma_mon_an = ?";
    return pdo_mutaion($sql, $id);
}

function updateMonAn($id, $maloaimon, $tenmon, $gia, $mota, $img)
{
    $sql = "UPDATE mon_an SET ma_loai_mon = ?, ten_mon = ?, gia_mon = ?, mo_ta = ?, img = ? WHERE ma_mon_an = ?";
    return pdo_mutaion($sql, $maloaimon, $tenmon, $gia, $mota, $img, $id);
}


function updateMonAnExcludeImg($id, $maloaimon, $tenmon, $gia, $mota)
{
    $sql = "UPDATE mon_an SET ma_loai_mon = ?, ten_mon = ?,gia_mon = ?, mo_ta = ? WHERE ma_mon_an = ?";
    return pdo_mutaion($sql, $maloaimon, $tenmon, $gia, $mota, $id);
}

function getAllKhachHang($order = 'asc')
{
    $sql = "SELECT * FROM khach_hang ORDER BY ma_kh $order";
    return pdo_querys($sql);
}

function addKhachHang($tenkh, $sodt, $email, $password, $img)
{
    $sql = "INSERT INTO khach_hang (ten_kh, email, so_dt, password, img) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $tenkh, $sodt,  $email, $password, $img);
}

function checkhachang($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email = ?";
    return pdo_query($sql, $email);
}


function checkKhachHangByEmail($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email = ?";
    return pdo_query($sql, $email);
}

function deleteKhachHang($id)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh = ?";
    return pdo_mutaion($sql, $id);
}


function updateKhachHang($id, $tenkh, $sodt, $email)
{
    $sql = "UPDATE khach_hang SET ten_kh = ?, so_dt = ?, email = ? WHERE ma_kh = ?";
    return pdo_mutaion($sql, $tenkh, $sodt, $email, $id);
}

function updateUser($id, $tenkh, $sodt, $email, $vai_tro)
{
    $sql = "UPDATE khach_hang SET ten_kh = ?, so_dt = ?, email = ?, vai_tro = ? WHERE ma_kh = ?";
    return pdo_mutaion($sql, $tenkh, $sodt, $email, $vai_tro, $id);
}


function updateKhachHangWithImg($tenkh, $sodt, $email, $img, $id,)
{
    $sql = "UPDATE khach_hang SET ten_kh = ?, so_dt = ?, email = ?, img = ? WHERE ma_kh = ?";
    return pdo_mutaion($sql, $tenkh, $sodt, $email, $img, $id);
}


function getKhachHangById($id)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = ?";
    return pdo_query($sql, $id);
}

function updatePassWord($password, $ma_kh)
{
    $sql = "UPDATE khach_hang SET password = ? WHERE ma_kh = ?";
    return pdo_mutaion($sql, $password, $ma_kh);
}

function changePassWord($email, $password)
{
    $sql = "UPDATE khach_hang SET password = ? WHERE email = ?";
    return pdo_mutaion($sql, $password, $email);
}

function getHoaDonById($id)
{
    $sql = "SELECT * FROM hoa_don WHERE ma_hoa_don = ?";
    return pdo_query($sql, $id);
}

function insertHoaDon($ma_kh, $ma_dat_ban, $ngay_lap, $tong_tien, $trang_thai)
{
    $sql = "INSERT INTO hoa_don (ma_kh,ma_dat_ban, ngay_lap, tong_tien, trang_thai) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_kh, $ma_dat_ban,  $ngay_lap, $tong_tien, $trang_thai);
}

function updateHoaDon($tong_tien, $ma_hoa_don)
{
    $sql = "UPDATE hoa_don SET tong_tien = ? WHERE ma_hoa_don = ?";
    return pdo_mutaion($sql, $tong_tien, $ma_hoa_don);
}

function updateTrangThaiHoaDon($trang_thai, $ma_hoa_don)
{
    $sql = "UPDATE hoa_don SET trang_thai = ? WHERE ma_hoa_don = ?";
    return pdo_mutaion($sql, $trang_thai, $ma_hoa_don);
}

function insertChiTietHoaDon($ma_hoa_don, $ma_mon_an, $ten_mon, $so_luong, $don_gia)
{
    $sql = "INSERT INTO chi_tiet_hoa_don (ma_hoa_don, ma_mon_an, ten_mon, so_luong, don_gia) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_hoa_don, $ma_mon_an, $ten_mon, $so_luong, $don_gia);
}

function updateChiTietHoaDon($so_luong, $ma_chi_tiet_hoa_don)
{
    $sql = "UPDATE chi_tiet_hoa_don SET so_luong = so_luong + ? WHERE ma_chi_tiet_hoa_don = ?";
    return pdo_mutaion($sql, (int)$so_luong, $ma_chi_tiet_hoa_don);
}

function deleteChiTietHoaDon($id)
{
    $sql = "DELETE FROM chi_tiet_hoa_don WHERE ma_chi_tiet_hoa_don = ?";
    return pdo_mutaion($sql, $id);
}

function getAllBan()
{
    $sql = "SELECT * FROM ban";
    return pdo_querys($sql);
}

function getBanByMaDatBan($ma_dat_ban)
{
    $sql = "SELECT * FROM ban INNER JOIN dat_ban on ban.ma_ban = dat_ban.ma_ban WHERE ma_dat_ban = ?";
    return pdo_query($sql, $ma_dat_ban);
}

function getAllBanByStatus($trang_thai)
{
    $sql = "SELECT * FROM ban WHERE trang_thai = ?";
    return pdo_querys($sql, $trang_thai);
}

function insertBan($so_ban, $trang_thai)
{
    $sql = "INSERT INTO ban (so_ban, trang_thai) VALUES (?, ?)";
    return pdo_mutaion($sql, $so_ban, $trang_thai);
}


function getBanById($id)
{
    $sql = "SELECT * FROM ban WHERE ma_ban = ?";
    return pdo_query($sql, $id);
}

function updateBan($so_ban, $trang_thai, $ma_ban)
{
    $sql = "UPDATE ban SET so_ban = ?, trang_thai = ? WHERE ma_ban = ?";
    return pdo_mutaion($sql, $so_ban, $trang_thai, $ma_ban);
}


function updateTrangThaiBan($trang_thai, $ma_ban)
{
    $sql = "UPDATE ban SET trang_thai = ? WHERE ma_ban = ?";
    return pdo_mutaion($sql, $trang_thai, $ma_ban);
}

function defeleteBan($so_ban)
{
    $sql = "DELETE FROM ban WHERE so_ban = ?";
    return pdo_mutaion($sql, $so_ban);
}

function insertDatBan($ma_ban, $ma_kh, $ngay_dat, $gio, $songuoi = '1')
{
    $sql = "INSERT INTO dat_ban (ma_ban, ma_kh, ngay_dat, gio, so_nguoi) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_ban, $ma_kh, $ngay_dat, $gio, $songuoi);
}

function getListDatBan()
{
    $sql =
        "SELECT khach_hang.ma_kh, khach_hang.ten_kh, khach_hang.email, khach_hang.so_dt, dat_ban.ngay_dat, dat_ban.gio, dat_ban.so_nguoi, hoa_don.tong_tien, hoa_don.trang_thai, ban.ma_ban, ban.so_ban, dat_ban.ma_dat_ban 
        FROM khach_hang 
        INNER JOIN dat_ban ON khach_hang.ma_kh = dat_ban.ma_kh 
        INNER JOIN hoa_don ON dat_ban.ma_dat_ban = hoa_don.ma_dat_ban 
        INNER JOIN ban ON dat_ban.ma_ban = ban.ma_ban
        ORDER BY dat_ban.ma_dat_ban DESC;
        ";
    return pdo_querys($sql);
}

function getListDatBanById($id)
{
    $sql = "SELECT khach_hang.ma_kh, khach_hang.ten_kh, khach_hang.email, khach_hang.so_dt, dat_ban.ngay_dat, dat_ban.gio, dat_ban.so_nguoi, hoa_don.tong_tien, hoa_don.trang_thai, ban.ma_ban, ban.so_ban, dat_ban.ma_dat_ban 
    FROM khach_hang 
    INNER JOIN dat_ban ON khach_hang.ma_kh = dat_ban.ma_kh 
    INNER JOIN hoa_don ON dat_ban.ma_dat_ban = hoa_don.ma_dat_ban 
    INNER JOIN ban ON dat_ban.ma_ban = ban.ma_ban
    WHERE khach_hang.ma_kh = ?
    ORDER BY dat_ban.ma_dat_ban DESC";
    return pdo_querys($sql, $id);
}



function getDatBanById($id)
{
    $sql =
        "SELECT khach_hang.ma_kh, khach_hang.ten_kh, khach_hang.email, khach_hang.so_dt, dat_ban.ngay_dat, dat_ban.gio, dat_ban.so_nguoi, hoa_don.tong_tien, hoa_don.trang_thai, ban.ma_ban, ban.so_ban, dat_ban.ma_dat_ban, hoa_don.ma_hoa_don 
        FROM khach_hang 
        INNER JOIN dat_ban ON khach_hang.ma_kh = dat_ban.ma_kh 
        INNER JOIN hoa_don ON dat_ban.ma_dat_ban = hoa_don.ma_dat_ban 
        INNER JOIN ban ON dat_ban.ma_ban = ban.ma_ban WHERE dat_ban.ma_dat_ban = ?;
    ";
    return pdo_query($sql, $id);
}

function getListBinhLuan()
{
    $sql =
        "SELECT mon_an.ma_mon_an, mon_an.ten_mon, mon_an.gia_mon, COUNT(*) AS tong_so_binh_luan, MAX(binh_luan.ngay_binh_luan) AS ngay_moi_nhat, MIN(binh_luan.ngay_binh_luan) AS ngay_cu_nhat 
        FROM binh_luan 
        INNER JOIN mon_an ON binh_luan.ma_mon_an = mon_an.ma_mon_an 
        GROUP BY mon_an.ma_mon_an, mon_an.ten_mon, mon_an.gia_mon;";
    return pdo_querys($sql);
}

function getListDetailBinhLuanById($id)
{
    $sql =
        "SELECT mon_an.ten_mon,binh_luan.ten_kh, binh_luan.ma_kh, binh_luan.noi_dung, binh_luan.ngay_binh_luan, binh_luan.ma_binh_luan 
        FROM binh_luan 
        INNER join mon_an on binh_luan.ma_mon_an = mon_an.ma_mon_an 
        WHERE mon_an.ma_mon_an = ?
        GROUP BY binh_luan.ma_binh_luan DESC;";
    return pdo_querys($sql, $id);
}

function insertBinhLuan($ma_kh, $ma_mon_an, $ten_kh, $noi_dung, $ngay_binh_luan)
{
    $sql = "INSERT INTO binh_luan (ma_kh, ma_mon_an, ten_kh, noi_dung, ngay_binh_luan) VALUES (?, ?, ?, ?, ?)";
    return pdo_mutaion($sql, $ma_kh, $ma_mon_an, $ten_kh, $noi_dung, $ngay_binh_luan);
}

function getListBinhLuanById($id)
{
    $sql =
        "SELECT khach_hang.ten_kh, khach_hang.img, binh_luan.noi_dung FROM binh_luan 
        INNER JOIN khach_hang on binh_luan.ma_kh = khach_hang.ma_kh 
        WHERE binh_luan.ma_mon_an = ?
        GROUP BY binh_luan.ma_binh_luan DESC";
    return pdo_querys($sql, $id);
}

function deleteBinhLuan($ma_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan = ?";
    return pdo_mutaion($sql, $ma_binh_luan);
}


function getMenuById($id)
{
    $sql =
        "SELECT hoa_don.ma_hoa_don, hoa_don.ma_kh, chi_tiet_hoa_don.ma_mon_an,chi_tiet_hoa_don.ma_chi_tiet_hoa_don, chi_tiet_hoa_don.ten_mon, chi_tiet_hoa_don.so_luong, chi_tiet_hoa_don.don_gia 
        FROM hoa_don INNER JOIN chi_tiet_hoa_don 
        on hoa_don.ma_hoa_don = chi_tiet_hoa_don.ma_hoa_don 
        WHERE hoa_don.ma_hoa_don = ?";
    return pdo_querys($sql, $id);
}
