<?php

if (isset($_GET['ma_loai_mon'])) {
    $maloai = $_GET['ma_loai_mon'];
    $row = getLoaiMonById($maloai);
    if (isset($row)) {
        extract($row);
    }
} else {
    $maloai = '';
}

?>
<div class="container">
    <h1 class="heading">Cập Nhật Loại Món</h1>
    <form action="/admin/?act=update-type-food" method="post" class="form-inner">
        <div class="form-group">
            <label for="" class="form-label">Mã Loại</label>
            <input type="text" name="name" value=" <?php echo $maloai; ?>" disabled class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Tên Loại Món</label>
            <input type="text" name="tenloai" value="<?php echo $ten_loai; ?>" class="form-control">
        </div>
        <input type="hidden" name="maloai" value="<?php echo $maloai; ?>">
        <p style="margin-left: 20px; color: green; font-weight: bold;"><?php echo isset($thongbao) ? $thongbao : ''; ?></p>
        <button class="btn" name="update-type-food">Cập Nhật</button>
        <a href="/admin/?act=list-type-food" class="link">Danh Sách</a>
    </form>
</div>