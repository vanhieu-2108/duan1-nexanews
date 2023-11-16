<?php
$rows = getAllLoaiMon()
?>

<div class="container">
    <h1 class="heading">Thêm Món</h1>
    <form method="POST" action="/admin/?act=add-food" class="form-inner" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="form-label">Loại Món</label>
            <select style="padding: 13px 10px; border-radius: 4px; border: 1px solid gray; outline: none;" name="maloaimon">
                <option value="">Chọn</option>
                <?php
                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        extract($row);
                        echo '<option value="' . $ma_loai_mon . '">' . $ten_loai . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Tên Món</label>
            <input type="text" name="tenmon" class="form-control">
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Giá Món</label>
            <input type="text" name="gia" class="form-control">
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Mô Tả</label>
            <textarea style="border-radius: 4px; border: 1px solid gray;" name="mota" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Ảnh</label>
            <input type="file" name="anh" class="form-control">
        </div>
        <button class="btn" name="add-food">Thêm</button>
        <a href="#!" class="btn">Danh Sách Món</a>
    </form>
    <div style="padding-bottom: 40px;"></div>
</div>