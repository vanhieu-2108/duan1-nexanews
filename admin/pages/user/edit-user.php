<?php

if (isset($_GET['ma_kh'])) {
    $ma_kh = $_GET['ma_kh'];
    $row = getKhachHangById($ma_kh);
    if (is_array($row)) {
        extract($row);
    }
}

?>
<div class="container">
    <h1 class="heading">Cập Nhật Người Dùng</h1>
    <form action="/admin/?act=update-user" method="post" class="form-inner">
        <div class="form-group">
            <label for="" class="form-label">Tên Người Dùng</label>
            <input type="text" value="<?php echo isset($ten_kh) ? htmlspecialchars($ten_kh) : '' ?>" name="ten_kh" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số Điện Thoại</label>
            <input type="text" name="so_dt" value="<?php echo isset($so_dt) ? htmlspecialchars($so_dt) : '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Vai Trò</label>
            <select name="vai_tro" id="" style="padding: 13px 12px; outline: none;border-radius: 4px;">
                <option disabled value="">Chọn</option>
                <?php
                if ($vai_tro == 1) {
                    echo '
                    <option value="1" selected>Admin</option>
                    <option value="0">User</option>
                    ';
                } else {
                    echo '
                    <option value="1">Admin</option>
                    <option value="0" selected>User</option>
                    ';
                }
                ?>
            </select>
        </div>
        <p style="margin-left: 20px; color: green; font-weight: bold;"><?php echo isset($thongbao) ? $thongbao : ''; ?></p>
        <input type="hidden" value="<?php echo isset($ma_kh) ? htmlspecialchars($ma_kh) : '' ?>" name="ma_kh" class="form-control">
        <button class="btn" name="update-user">Cập Nhật</button>
        <a href="/admin/?act=list-user" class="link">Danh Sách</a>
    </form>
</div>