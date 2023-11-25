<?php
if (isset($_POST['update-password'])) {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $password_old = $_POST['password_old'];
    $password_new = $_POST['password_new'];
    $confirm_password_new = $_POST['confirm_password_new'];
    $errors = [];
    if (empty($password_old)) {
        $errors['password_old'] = 'Mật khẩu cũ là bắt buộc!';
    }
    if (empty($password_new)) {
        $errors['password_new'] = 'Mật khẩu mới là bắt buộc!';
    }
    if (empty($confirm_password_new)) {
        $errors['confirm_password_new'] = 'Nhập lại mật khẩu mới là bắt buộc!';
    }
    if ($password_new != $confirm_password_new) {
        $errors['confirm_password_new'] = 'Nhập lại mật khẩu mới không khớp!';
    }
    if (empty($errors)) {
        $ma_kh = $_SESSION['user']['ma_kh'];
        $row = getKhachHangById($ma_kh);
        if (is_array($row)) {
            if (password_verify($password_old, $row['password'])) {
                $password_new_hash = password_hash($password_new, PASSWORD_DEFAULT);
                updatePassWord($password_new_hash, $ma_kh);
                $noti = '<p style="color: green;" class="noti">Đổi mật khẩu thành công!</p>';
            } else {
                $noti = '<p style="color: red;" class="noti">Mật khẩu cũ không đúng!</p>';
            }
        }
    }
}

?>
<div class="container">
    <?php include('./client/includes/menu/menu.php') ?>
    <div class="group-right">
        <h2>Đổi Mật Khẩu</h2>
        <form action="" method="POST" novalidate class="form-main" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Nhập Mật Khẩu Cũ</label>
                <input type="password" name="password_old" placeholder="Password Old..." value="<?php echo isset($_POST['password_old']) ? htmlspecialchars($_POST['password_old']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['password_old']) ? $errors['password_old'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Nhập Mật Khẩu Mới</label>
                <input type="password" name="password_new" placeholder="Password New..." value="<?php echo isset($_POST['password_new']) ? htmlspecialchars($_POST['password_new']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['password_new']) ? $errors['password_new'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Nhập Lại Mật Khẩu Mới</label>
                <input type="password" name="confirm_password_new" placeholder="Confirm Password New..." value="<?php echo isset($_POST['confirm_password_new']) ? htmlspecialchars($_POST['confirm_password_new']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['confirm_password_new']) ? $errors['confirm_password_new'] : ''; ?></span>
            </div>
            <?php echo isset($noti) ? $noti : ''; ?>
            <input name="update-password" class="btn" type="submit" value="Đổi Mật Khẩu">
        </form>
    </div>
</div>