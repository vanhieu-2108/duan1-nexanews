<div class="container">
    <h1 class="heading">Danh Sách Bình Luận</h1>
    <table>
        <thead>
            <tr>
                <td>Têm Món Ăn</td>
                <td>Tên Người Bình Luận</td>
                <td>Ngày Bình Luận</td>
                <td>Nội Dung</td>
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
                            <td>' . $ten_kh . '</td>
                            <td>' . $ngay_binh_luan . '</td>
                            <td>
                                <p class="conntent-cmt">' . $noi_dung . '</p>
                            </td>
                            <td><a href="/admin/?act=delete-comment&ma_binh_luan=' . $ma_binh_luan . '">Xóa</a></td>
                        </tr>
                        ';
                }
            }
            ?>
        </tbody>
    </table>
</div>