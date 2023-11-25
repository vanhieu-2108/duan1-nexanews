<div class="container">
    <?php include('./client/includes/menu/menu.php') ?>
    <div class="group-right">
        <h2>Thông Tin Tài Khoản</h2>
        <form action="/?act=update-profile" method="POST" novalidate class="form-main" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Nhập Họ Tên</label>
                <input type="text" name="full-name" placeholder="FullName..." value="<?php echo isset($_SESSION['user']['ten_kh']) ? htmlspecialchars($_SESSION['user']['ten_kh']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['ten_kh']) ? $errors['ten_kh'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Số Điện Thoại</label>
                <input type="text" name="tel" placeholder="070......" value="<?php echo isset($_SESSION['user']['so_dt']) ? htmlspecialchars($_SESSION['user']['so_dt']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['so_dien_thoai']) ? $errors['so_dien_thoai'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" name="email" placeholder="Email..." value="<?php echo isset($_SESSION['user']['email']) ? htmlspecialchars($_SESSION['user']['email']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Ảnh</label>
                <img src="/uploads/<?php echo isset($_SESSION['user']['img']) ? htmlspecialchars($_SESSION['user']['img']) : ''; ?>" alt="" width="200" height="200">
                <input type="file" name="anh" placeholder="070......">
                <span class="message-error"><?php echo isset($errors['anh']) ? $errors['anh'] : ''; ?></span>
            </div>
            <span class="message-error"><?php echo isset($noti) ? $noti : ''; ?></span>
            <input name="update-profile" class="btn" type="submit" value="Cập Nhật">
        </form>
    </div>
</div>