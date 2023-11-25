<div class="container">
    <h1 class="heading">Danh Sách Bàn</h1>
    <table>
        <thead>
            <tr>
                <td>Mã Bàn</td>
                <td>Số Bàn</td>
                <td>Trạng Thái</td>
                <td colspan="2">Hành Động</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) {
                extract($row);
                $suasp = "/admin/?act=edit-table&ma_ban=" . $ma_ban;
                $xoasp = "/admin/?act=delete-list-type&ma_ban=" . $ma_ban;
                if ($trang_thai == 1) {
                    $status = '<span style="color: green">Đang Được Đặt</span>';
                } else {
                    $status = '<span style="color: blue">Chưa Đặt</span>';
                }
                echo '
                <tr>
                    <td>' . $ma_ban . '</td>
                    <td>' . $so_ban . '</td>
                    <td>' . $status . '</td>
                    <td><a href="' . $suasp . '">Sửa<i class="fa-solid fa-pencil"></i></a></td>
                    <td><a href="' . $xoasp . '">Xóa<i class="fa-solid fa-trash"></i></a></td>
                </tr>
                    ';
            }
            ?>
        </tbody>
    </table>
    <a href="/admin?act=table" class="act-link">Tạo Thêm</a>
</div>