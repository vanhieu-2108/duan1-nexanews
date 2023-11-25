<div class="container">
    <?php include('./client/includes/menu/menu.php') ?>
    <div class="group-right">
        <h2>Danh Sách Bàn Đã Đặt</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày Đặt</th>
                    <th>Thời Gian</th>
                    <th>Số Người</th>
                    <th>Số Bàn</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = getListDatBanById($_SESSION['user']['ma_kh']);
                if (is_array($rows)) {
                    $i = 1;
                    foreach ($rows as $row) {
                        extract($row);
                        if ($trang_thai == 0) {
                            $status = '<td style="background-color: #c1a17b;" class="status">Đang Đặt</td>';
                        } else if ($trang_thai == 1) {
                            $status = '<td style="background-color: green;" class="status">Thành Công</td>';
                        } else {
                            $status = '<td style="background-color: red;" class="status">Đã Hủy</td>';
                        }
                        echo  '
                        <tr>
                            <td>' . $i++ . '</td>
                            <td>' . $ngay_dat . '</td>
                            <td>' . $gio . '</td>
                            <td>' . $so_nguoi . '</td>
                            <td>' . $so_ban . '</td>
                            <td>' . formatCurrency($tong_tien) . ' đ</td>
                            ' . $status . '
                            <td>
                                <a style="color: #333" href="/admin/pages/bill/bill.php/?ma_dat_ban=' . $ma_dat_ban . '">
                                    Xem Hóa Đơn
                                </a>
                            </td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>