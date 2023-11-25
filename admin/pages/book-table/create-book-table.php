<div class="container">
    <form action="/admin/?act=insert-book-table" method="POST">
        <h1 class="heading">Thông tin khách hàng</h1>
        <div action="" class="form-inner">
            <div class="form-group">
                <label for="" class="form-label">Tên Người Đặt</label>
                <input type="text" name="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Số Điện Thoại</label>
                <input type="text" name="tel" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Số Người</label>
                <input type="text" name="countperson" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Ngày</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Giờ</label>
                <input type="text" name="hour" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Số Bàn</label>
                <select name="quantitytable" id="" style="padding: 13px 10px; outline: none;" class="form-control">
                    <option disabled value="" selected>Chọn Số Bàn</option>
                    <?php
                    $rows = getAllBanByStatus(0);
                    if (is_array($rows)) {
                        foreach ($rows as $row) {
                            extract($row);
                            echo '<option value="' . $ma_ban . '">Bán Số: ' . $so_ban . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Khách Hàng</label>
                <input type="text" name="hour" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Trạng Thái</label>
                <select name="status" id="" style="padding: 13px 10px; outline: none;" class="form-control">
                    <option value="" selected>Chọn</option>
                    <option value="0">Chưa Thanh Toán</option>
                    <option value="1">Đã Thanh Toán</option>
                </select>
            </div>
        </div>
        <h1 class="heading">Danh Sách Món Ăn</h1>
        <div class="tabs">
            <?php
            $count = 0;
            $rows = getAllLoaiMon();
            if (is_array($rows)) {
                foreach ($rows as $row) {
                    extract($row);
                    if ($count == 0) {
                        echo '<div class="tab active">' . $ten_loai . '</div>';
                    } else {
                        echo '<div class="tab">' . $ten_loai . '</div>';
                    }
                    $count = 1;
                }
            }
            ?>
        </div>
        <div class="menus">
            <?php
            $count = 0;
            $rows = getAllLoaiMon();
            if (is_array($rows)) {
                foreach ($rows as $row) {
                    extract($row);
                    if ($count == 0) {
                        echo '<div class="menu-item active">';
                    } else {
                        echo '<div class="menu-item">';
                    }
                    renderFoodByTypeFood($ten_loai);
                    echo '</div>';
                    $count = 1;
                }
            }
            ?>
        </div>

        <button class="btn" name="insert-book-table">Tạo Hóa Đơn</button>
    </form>
</div>
</div>
<script>
    window.addEventListener('load', () => {
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)
        const tabs = $$('.tabs .tab')
        const panes = $$('.menus .menu-item');
        [...tabs].forEach((tab, index) => {
            tab.addEventListener('click', () => {
                const pane = panes[index];
                $('.tab.active').classList.remove('active');
                $('.menu-item.active').classList.remove('active');
                tab.classList.add('active');
                pane.classList.add('active');
            })
        })
    })
</script>