<div class="group-left">
    <h2>Menu</h2>
    <ul class="list">
        <?php
        if (isset($_GET['act']) && $_GET['act'] === 'profile') {
            echo '
                <li class="item active">
                <a href="/?act=profile" class="link">Thông Tin Tài Khoản</a>
                </li>
                <li class="item">
                <a href="/?act=list-book-table" class="link">Danh Sách Đặt Bàn</a>
                </li>
                <li class="item">
                <a href="/?act=change-password" class="link">Đổi Mật Khẩu</a>
                </li>
                ';
        } else if (isset($_GET['act']) && $_GET['act'] == 'list-book-table') {
            echo '
                <li class="item">
                <a href="/?act=profile" class="link">Thông Tin Tài Khoản</a>
                </li>
                <li class="item active">
                <a href="/?act=list-book-table" class="link">Danh Sách Đặt Bàn</a>
                </li>
                <li class="item">
                <a href="/?act=change-password" class="link">Đổi Mật Khẩu</a>
                </li>
                ';
        } else {
            echo '
                <li class="item">
                <a href="/?act=profile" class="link">Thông Tin Tài Khoản</a>
                </li>
                <li class="item">
                <a href="/?act=list-book-table" class="link">Danh Sách Đặt Bàn</a>
                </li>
                <li class="item active">
                <a href="/?act=change-password" class="link">Đổi Mật Khẩu</a>
                </li>
                ';
        }
        ?>
    </ul>
</div>