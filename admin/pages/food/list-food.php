<div class="container">
    <h1 style="width: 95%;" class="heading">Danh Sách Món</h1>
    <table style="width: 95%;">
        <thead>
            <tr>
                <td>Mã Món Ăn</td>
                <td>Mã Loại Món</td>
                <td>Tên Loại Món</td>
                <td>Tên Món</td>
                <td>Giá Món</td>
                <td>Mô Tả</td>
                <td>Hình Ảnh</td>
                <td colspan="2">Hành Động</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) {
                extract($row);
                $suasp = "/admin/?act=edit-food&ma_mon_an=" . $ma_mon_an;
                $xoasp = "/admin/?act=delete-food&ma_mon_an=" . $ma_mon_an;
                echo '
                <tr>
                    <td>' . $ma_mon_an . '</td>
                    <td>' . $ma_loai_mon . '</td>
                    <td>' . $ten_loai . '</td>
                    <td>' . $ten_mon . '</td>
                    <td>' . formatCurrency($gia_mon) . ' đ' . '</td>
                    <td><p class="td-desc">' . $mo_ta . '</p></td>
                    <td>' . '<img width="100px" height="100px"  src="../uploads/' . $img . '" alt="">' . '</td>
                    <td><a href="' . $suasp . '">Sửa<i class="fa-solid fa-pencil"></i></a></td>
                    <td><a href="' . $xoasp . '">Xóa<i class="fa-solid fa-trash"></i></a></td>
                </tr>
                    ';
            }
            ?>
        </tbody>
    </table>
    <a href="/admin?act=food" class="act-link">Tạo Thêm</a>
</div>