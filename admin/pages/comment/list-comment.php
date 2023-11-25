<div class="container">
    <h1 class="heading">Danh Sách Bình Luận</h1>
    <table>
        <thead>
            <tr>
                <td>Têm Món Ăn</td>
                <td>Giá Món</td>
                <td>Tổng Bình Luận</td>
                <td>Mới Nhất</td>
                <td>Cũ Nhất</td>
                <td>Hành Động</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows)) {
                foreach ($rows as $row) {
                    extract($row);
                    echo '
                    <tr>
                        <td>' . $ten_mon . '</td>
                        <td>' . formatCurrency($gia_mon) . 'đ</td>
                        <td>' . $tong_so_binh_luan . '</td>
                        <td>' . $ngay_moi_nhat . '</td>
                        <td>' . $ngay_cu_nhat . '</td>
                        <td><a href="/admin/?act=detail-comment&ma_mon_an=' . $ma_mon_an . '">Chi Tiết</a></td>
                    </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>
</div>