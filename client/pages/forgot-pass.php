<?php
// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    // Kiểm tra validation
    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ!";
    }
    if (empty($email)) {
        $errors['email'] = "Email là bắt buộc!";
    }

    if (empty($password)) {
        $errors['password'] = "Mật khẩu là bắt buộc!";
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Nhập lại mật khẩu là bắt buộc!";
    }

    if ($password != $confirm_password) {
        $errors['confirm_password'] = "Nhập lại mật khẩu không khớp!";
    }

    // Nếu không có lỗi, xử lý dữ liệu hoặc chuyển hướng đến trang khác
    if (empty($errors)) {
        $checkEmail = checkhachang($email);
        if (is_array($checkEmail) && count($checkEmail) > 0) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            changePassWord($email, $passwordHash);
            $noti = '<span style="color: green" class="message-error">Lấy Lại mật khẩu Thành Công!</span>';
        } else {
            $noti = '<span class="message-error">Email không tồn tại!</span>';
        }
    }
}
?>
<div class="container">
    <div class="form-wrap">
        <form action="" method="POST" novalidate class="form-main">
            <h1 class="title">Quên Mật Khẩu</h1>
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" name="email" placeholder="Email..." value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Mật Khẩu Mới:</label>
                <input type="password" name="password" placeholder="Password..." value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email"> Nhập Lại Mật Khẩu Mới:</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password..." value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : ''; ?></span>
            </div>
            <?php echo isset($noti) ? $noti : ''; ?>
            <input name="submit" class="btn" type="submit" value="Lấy Lại Mật Khẩu">
            <div class="form-footer">
                <p class="form-footer-text">
                    Bạn Đã Nhớ Tài Khoản?
                    <a href="/?act=login" class="form-footer-link">Đăng Nhập</a>
                </p>
            </div>
        </form>
    </div>
</div>