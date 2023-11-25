<div class="container">
    <h1 class="heading">Danh Sách Người Dùng</h1>
    <table>
        <thead>
            <tr>
                <td>Mã Khách Hàng</td>
                <td>Tên Người Dùng</td>
                <td>Email</td>
                <td>Số Điện Thoại</td>
                <td>Vai Trò</td>
                <td colspan="1">Hành Động</td>
            </tr>
        </thead>
        <tbody>
            <?php

            if (is_array($rows)) {
                foreach ($rows as $row) {
                    extract($row);
                    if ($vai_tro == 1) {
                        $role = 'Admin';
                    } else {
                        $role = 'User';
                    }
                    echo '<tr>
                                <td>' . $ma_kh . '</td>
                                <td>' . $ten_kh . '</td>
                                <td>' . $email . '</td>
                                <td>' . $so_dt . '</td>
                                <td>' . $role . '</td>
                                <td><a href="index.php?act=edit-user&ma_kh=' . $ma_kh . '">Sửa<i class="fa-solid fa-pencil"></i></a></td>
                            </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>