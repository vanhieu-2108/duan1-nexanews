<div class="container">
    <div class="group-heading">
        <h1 class="heading">Danh Sách Đặt Bàn</h1>
    </div>
    <table>
        <thead>
            <tr>
                <td>STT</td>
                <td>Thông tin khách hàng</td>
                <td>Thông tin đặt bàn</td>
                <td>Trạng thái</td>
                <td colspan="2">Hành Động</td>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php
            $rows = getListDatBan();
            $stt = 1;
            if (is_array($rows)) {
                foreach ($rows as $row) {
                    extract($row);
                    if ($trang_thai == 1) {
                        $trang_thai = '<p style="padding: 5px; background-color: green; text-align: center; color: #fff" class="status">Đang Đặt Bàn</p>';
                    } else if ($trang_thai == 0) {
                        $trang_thai = '<p style="padding: 5px; background-color: gray; text-align: center; color: #fff" class="status">Đang Xử Lí</p>';
                    } else {
                        $trang_thai = '<p style="padding: 5px; background-color: red; text-align: center; color: #fff" class="status">Đã Hủy</p>';
                    }
                    if ($kieu_ban == 1) {
                        $kieu_ban = 'Bàn Đơn';
                    } else if ($kieu_ban == 2) {
                        $kieu_ban = 'Bàn Đôi';
                    } else {
                        $kieu_ban = 'Bàn Dài';
                    }
                    echo '
                    <tr>
                    <td>
                        ' . $stt . '
                    </td>
                    <td>
                        <p>Họ Và Tên: ' . $ten_kh . '</p>
                        <p>Email: ' . $email . '</p>
                        <p>Phone: ' . $so_dt . '</p>
                    </td>
                    <td>
                        <p>Loại Bàn: ' . $kieu_ban . '</p>
                        <p>Ngày Đặt: ' . $ngay_dat . '</p>
                        <p>Giờ Tới: ' . $gio . '</p>
                        <p>Số Người: ' . $so_nguoi . '</p>
                        <p>Tổng Tiền: ' . formatCurrency($tong_tien) . ' đ</p>
                    </td>
                    <td>
                       ' . $trang_thai . '
                    </td>
                    <td>
                        <a href="/admin/?act=edit-book-table&id=' . $ma_dat_ban . '&ma_kh=' . $ma_kh . '">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/admin/pages/bill/bill.php/?ma_dat_ban=' . $ma_dat_ban . '">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
                    ';
                    $stt++;
                }
            }
            ?>
        </tbody>
    </table>
</div>