<div class="container">
    <h1 class="heading">Thêm Bàn</h1>
    <form action="/admin/?act=add-table" method="post" class="form-inner">
        <div class="form-group">
            <label for="" class="form-label">Mã Loại</label>
            <input type="text" name="name" disabled class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số Bàn</label>
            <input required type="text" name="counttable" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Trạng Thái</label>
            <select required style="padding: 13px 10px;border-radius: 4px;outline: none;" name="status">
                <option value="" disabled>Chọn</option>
                <option value="0">Chưa Đặt</option>
                <option value="1">Đã Đặt</option>
            </select>
        </div>
        <p style="margin-left: 20px; color: green; font-weight: bold;"><?php echo isset($thongbao) ? $thongbao : ''; ?></p>
        <button class="btn" name="add-table">Thêm</button>
        <a href="/admin/?act=list-table" class="link">Danh Sách Bàn</a>
    </form>
</div>