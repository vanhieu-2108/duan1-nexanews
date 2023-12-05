<?php
if (!isset($_SESSION['user'])) {
    header("Location: /?act=login");
    exit();
}


if (isset($_POST['submit'])) {
    $_SESSION['menu'] = $_POST;
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $choice_table = $_POST['table'];
    $ma_kh = $_SESSION['user']['ma_kh'];
    $countperson = $_POST['countperson'];
    $status = 0;
    $menuItems = $_POST['name'];
    $filteredItems = filterNonEmptyQuantities($menuItems);
    $tong_tien = 0;
}


?>

<div class="container">
    <h2 class="sub-heading">Thông Tin</h2>
    <div class="group-info">
        <div class="group-left">
            <p>Họ tên: <?php echo $name ?></p>
            <p>Email: <?php echo $email ?></p>
            <p>Phone: <?php echo $tel ?></p>
            <p>Loại Bàn:
                <?php
                if ($choice_table == 1) {
                    echo 'Bàn Đơn 4 Người';
                } else if ($choice_table == 2) {
                    echo 'Bàn Đôi 8 Người';
                } else {
                    echo 'Bàn Dài 16 Người';
                }
                ?>
            </p>
        </div>
        <div class="group-right">
            <p>Ngày Đặt: <?php echo $date ?></p>
            <p>Giờ Tới: <?php echo $hour ?></p>
            <p>Số Người: <?php echo $countperson ?></p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Món Ăn</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
            </tr>
        </thead>
        <h2 class="sub-heading">Danh Sách Món Ăn Đặt</h2>
        <tbody>
            <?php
            $sum = 0;
            $count = 1;
            foreach ($filteredItems as $tenmon => $item) {
                $row = getMonAnWithName($tenmon);
                if (is_array($row)) {
                    $so_luong = $item['so_luong'];
                    $img = $row['img'];
                    $don_gia = $item['gia_mon'];
                    $ma_mon_an = $item['ma_mon_an'];
                    $sum += $so_luong * $don_gia;
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $tenmon . '</td>
                        <td>
                            <img src="/uploads/' . $img . '" height="100" style="object-fit: cover; margin: 0 auto;display: block">
                        </td>
                        <td>' . formatCurrency($don_gia) . ' đ</td>
                        <td>' . $so_luong . '</td>
                        <td>' . formatCurrency($so_luong * $don_gia) . ' đ</td>
                    </tr>
                    ';
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>
    <h2 class="sub-heading">Xác Nhận Đặt Bàn</h2>
    <div class="groups">
        <div class="form-group">
            <label class="form-label">
                Số Tiền Thanh Toán
            </label>
            <input type="text" disabled class="form-control" value="<?php echo formatCurrency($sum) . ' đ' ?>">
        </div>
    </div>
    <div class="actions">
        <form action="/client/pages/book-table.php">
            <button class="btn" type="submit">Xác Nhận</button>
        </form>
    </div>

</div>