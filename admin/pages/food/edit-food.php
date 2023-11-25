<?php

if (isset($_GET['ma_mon_an']) && $_GET['ma_mon_an'] > 0) {
    $listLoaiMon = getAllLoaiMon();
    $row = getMonAnById($_GET['ma_mon_an']);
    if (is_array($row)) {
        extract($row);
    }
}

?>

<div class="container">
    <h1 class="heading">Cập Nhật Món</h1>
    <form method="POST" action="/admin/?act=update-food" class="form-inner" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="form-label">Loại Món</label>
            <select value="<?= $row['ma_loai_mon'] ?>" style="padding: 13px 10px; border-radius: 4px; border: 1px solid gray; outline: none;" name="maloaimon">
                <option value="" disabled>Chọn</option>
                <?php
                if (is_array($listLoaiMon)) {
                    foreach ($listLoaiMon as $loaimon) {
                        extract($loaimon);
                        $selected =  ($row['ma_loai_mon'] == $ma_loai_mon) ? 'selected' : null;
                        echo "
                        <option value='$ma_loai_mon' $selected> $ten_loai</option>
                        ";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Tên Món</label>
            <input type="text" value="<?= $ten_mon ?>" name="tenmon" class="form-control">
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Giá Món</label>
            <input type="text" name="gia" value="<?= $gia_mon ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Mô Tả</label>
            <textarea style="border-radius: 4px; border: 1px solid gray;" name="mota" id="" cols="30" rows="10"><?php echo $mo_ta; ?></textarea>
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Ảnh</label>
            <img src="<?php echo "/uploads" . '/' . $img; ?>" alt="" width="200px" height="200px">
            <input type="file" name="anh" value="<?= $img ?>" class="form-control">
        </div>
        <input type="hidden" value="<?= $ma_mon_an ?>" name="mamonan">
        <button class="btn" name="update-food">Cập Nhật</button>
        <a href="/admin/?act=list-food" class="btn">Danh Sách Món</a>
    </form>
    <div style="padding-bottom: 40px;"></div>
</div>