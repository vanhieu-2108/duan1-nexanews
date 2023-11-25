<div class="container">
    <form action="/admin/?act=update-book-table" method="POST">
        <h1 class="heading">Cập Nhật Đặt Bàn</h1>
        <div action="" class="form-inner">
            <div class="form-group">
                <label for="" class="form-label">Tên Người Đặt</label>
                <input type="text" value="<?php echo isset($ten_kh) ? htmlspecialchars($ten_kh) : '' ?>" name="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Số Điện Thoại</label>
                <input type="text" value="<?php echo isset($so_dt) ? htmlspecialchars($so_dt) : '' ?>" name="tel" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="text" value="<?php echo isset($email) ? htmlspecialchars($email) : '' ?>" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Số Người</label>
                <input type="text" value="<?php echo isset($so_nguoi) ? htmlspecialchars($so_nguoi) : '' ?>" name="countperson" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Ngày</label>
                <input type="date" value="<?php echo isset($ngay_dat) ? htmlspecialchars($ngay_dat) : '' ?>" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Giờ</label>
                <input type="text" value="<?php echo isset($gio) ? htmlspecialchars($gio) : '' ?>" name="hour" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Trạng Thái</label>
                <select name="status" id="" style="padding: 13px 10px; outline: none;" class="form-control">
                    <?php
                    if (isset($trang_thai) && $trang_thai == 0) {
                        echo '
                        <option value="" disabled>Chọn</option>
                        <option value="0" selected>Chưa Thanh Toán</option>
                        <option value="1">Đã Thanh Toán</option>
                        <option value="2">Hủy Đơn</option>
                        ';
                    } else if (isset($trang_thai) && $trang_thai == 1) { {
                            echo '
                        <option value="" disabled>Chọn</option>
                        <option value="0">Chưa Thanh Toán</option>
                        <option value="1" selected>Đã Thanh Toán</option>
                        <option value="2">Hủy Đơn</option>
                        ';
                        }
                    } else {
                        echo '
                        <option value="" disabled>Chọn</option>
                        <option value="0">Chưa Thanh Toán</option>
                        <option value="1">Đã Thanh Toán</option>
                        <option value="2" selected>Hủy Đơn</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Tổng Tiền</label>
                <input disabled type="text" value="<?php echo isset($tong_tien) ? htmlspecialchars((formatCurrency($tong_tien)) . ' đ') : '' ?>" name="hour" class="form-control">
            </div>
        </div>
        <h1 class="heading">Danh Sách Món Ăn</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Món</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng Tiền</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = getMenuById($ma_hoa_don);
                $count = 1;
                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        extract($row);
                        echo ' 
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $ten_mon . '</td>
                        <td>' . $so_luong . '</td>
                        <td>' . formatCurrency($don_gia) . ' đ</td>
                        <td>' . formatCurrency($don_gia * $so_luong) . ' đ</td>
                        <td>
                            <a href="/admin/?act=delete-menu&id=' . $ma_dat_ban . '&ma_cthd=' . $ma_chi_tiet_hoa_don . '&ma_hd=' . $ma_hoa_don . '" class="delete" style="color: red;">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    ';
                        $count++;
                    }
                }
                ?>

            </tbody>
        </table>
        <h1 class="heading">Thêm Món Ăn</h1>
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
        <input type="hidden" name="ma_kh" value="<?php echo isset($_GET['ma_kh']) ? htmlspecialchars($_GET['ma_kh']) : '' ?>">
        <input type="hidden" name="mahoadon" value="<?php echo isset($ma_hoa_don) ? htmlspecialchars($ma_hoa_don) : '' ?>">
        <button class="btn" name="update-book-table">Cập Nhật</button>
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