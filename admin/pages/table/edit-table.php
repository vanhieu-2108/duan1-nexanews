<?php

if (isset($_GET['ma_ban'])) {
    $id = $_GET['ma_ban'];
    $row = getBanById($id);
    if (is_array($row)) {
        extract($row);
    }
}

?>

<div class="container">
    <h1 class="heading">Cập Nhật Bàn</h1>
    <form action="/admin/?act=update-table" method="post" class="form-inner">
        <div class="form-group">
            <label for="" class="form-label">Mã Loại</label>
            <input type="text" value="<?php echo $ma_ban; ?>" name="name" disabled class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số Bàn</label>
            <input type="text" value="<?php echo $so_ban; ?>" name="counttable" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Trạng Thái</label>
            <select style="padding: 13px 10px;border-radius: 4px;outline: none;" name="status">
                <option value="" disabled>Chọn</option>
                <?php
                if ($trang_thai == 0) {
                    echo '<option value="0" selected>Chưa Đặt</option>';
                    echo '<option value="1">Đã Đặt</option>';
                } else {
                    echo '<option value="0">Chưa Đặt</option>';
                    echo '<option value="1" selected>Đã Đặt</option>';
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="maban" value="<?php echo $ma_ban; ?>">
        <p style="margin-left: 20px; color: green; font-weight: bold;"><?php echo isset($thongbao) ? $thongbao : ''; ?></p>
        <button class="btn" name="update-table">Cập Nhật</button>
        <a href="/admin/?act=list-table" class="link">Danh Sách Bàn</a>
    </form>
</div>