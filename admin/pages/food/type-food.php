<div class="container">
    <h1 class="heading">Thêm Loại Món</h1>
    <form action="/admin/?act=add-type-food" method="post" class="form-inner">
        <div class="form-group">
            <label for="" class="form-label">Mã Loại</label>
            <input type="text" name="name" disabled class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Tên Loại Món</label>
            <input required type="text" name="tenloai" class="form-control">
        </div>
        <p style="margin-left: 20px; color: green; font-weight: bold;"><?php echo isset($thongbao) ? $thongbao : ''; ?></p>
        <button class="btn" name="add-type-food">Thêm</button>
        <a href="/admin/?act=list-type-food" class="link">Danh Sách</a>
    </form>
</div>