<div class="container">
    <h1 class="heading">Danh Sách Loại Món</h1>
    <table>
        <thead>
            <tr>
                <td>Mã Loại</td>
                <td>Tên Loại</td>
                <td colspan="2">Hành Động</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) {
                extract($row);
                $suasp = "/admin/?act=edit-type-food&ma_loai_mon=" . $ma_loai_mon;
                $xoasp = "/admin/?act=delete-list-type&ma_loai_mon=" . $ma_loai_mon;
                echo '
                <tr>
                    <td>' . $ma_loai_mon . '</td>
                    <td>' . $ten_loai . '</td>
                    <td><a href="' . $suasp . '">Sửa<i class="fa-solid fa-pencil"></i></a></td>
                    <td><a href="' . $xoasp . '">Xóa<i class="fa-solid fa-trash"></i></a></td>
                </tr>
                    ';
            }
            ?>
        </tbody>
    </table>
    <a href="/admin?act=type-food" class="act-link">Tạo Thêm</a>
</div>