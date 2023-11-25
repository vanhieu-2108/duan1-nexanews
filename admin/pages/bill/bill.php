<?php
session_start();
// Connect
include('../../../db/connect.php');
// Pdo
include('../../../model/pdo.php');
// Utils
include('../../../utils/utils.php');
// Dao
include('../../../model/dao.php');

if (isset($_GET['ma_dat_ban'])) {
    $data = getDatBanById($_GET['ma_dat_ban']);
    if (is_array($data)) {
        extract($data);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/assets/css/reset.css">
    <link rel="stylesheet" href="/admin/assets/css/bill.css">
    <title>Thông Tin Hóa Đơn</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header__logo">
                <img src="/imgs/nexa-logo-removebg-preview.png" alt="">
            </div>
            <p class="date">
                <?php echo $ngay_dat ?>
            </p>
        </header>
        <div class="info_res">
            <div class="group">
                <p>Thông Tin Nhà Hàng</p>
                <p><strong>Nhà Hàng NEXAFOOD</strong></p>
                <p>Tầng 4-5-6</p>
                <p>Tòa nhà Capital Place</p>
                <p>Phone: 1-978-082-1111</p>
                <p>Email: cskh@hotro.nexafood.vn</p>
            </div>
            <div class="group">
                <p>Khách Hàng</p>
                <p><strong><?php echo $ten_kh ?></strong></p>
                <p>Phone: <?php echo $so_dt ?></p>
                <p>Email: <?php echo $email ?></p>
                <p>Ngày Đặt: <?php echo $ngay_dat ?></p>
                <p>Giờ Vào: <?php echo $gio ?></p>
                <p>Số Người: <?php echo $so_nguoi ?></p>
            </div>
            <div class="group">
                <p>Thanh Toán</p>
                <p><strong>Tổng Tiền: <?php echo formatCurrency($tong_tien) ?>đ</strong></p>
            </div>
        </div>
        <div class="detail-bill">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Món</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rows = getMenuById($ma_hoa_don);
                    $count = 1;
                    foreach ($rows as $row) {
                        extract($row);
                        echo ' 
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $ten_mon . '</td>
                        <td>' . $so_luong . '</td>
                        <td>' . formatCurrency($don_gia) . 'đ</td>
                        <td>' . formatCurrency($don_gia * $so_luong) . 'đ</td>
                    </tr>';
                        $count++;
                    }
                    ?>
            </table>
            <div class="detail-foot">
                <div class="detail-group">
                    <p><strong>Tổng Tiền:</strong></p>
                    <p><?php echo (formatCurrency($tong_tien) . 'đ') ?></p>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="footer-group">
                <p><strong>Thu Ngân</strong></p>
                <p style="color: gray;">(ký ghi rõ họ tên)</p>
            </div>
            <div class="footer-group">
                <p><strong>Khách Hàng</strong></p>
                <p style="color: gray;">(ký ghi rõ họ tên)</p>
            </div>
        </footer>
        <div id="print">In Hóa Đơn</div>
    </div>
    <script>
        document.getElementById("print").addEventListener("click", function() {
            window.print();
        })
    </script>
</body>

</html>