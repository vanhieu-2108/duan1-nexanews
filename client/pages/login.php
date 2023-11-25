<?php
// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Kiểm tra validation
    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ!";
    }
    if (empty($email)) {
        $errors['email'] = "Email là bắt buộc!";
    }

    if (empty($password)) {
        $errors['password'] = "Password là bắt buộc!";
    }
    // Nếu không có lỗi, xử lý dữ liệu hoặc chuyển hướng đến trang khác
    if (empty($errors)) {
        $check = checkhachang($email);
        if (is_array($check)) {
            if (password_verify($password, $check['password'])) {
                $_SESSION['user'] = $check;
                header("Location: /");
                exit();
            } else {
                $noti = 'Email hoặc mật khẩu không đúng!';
            }
        } else {
            $noti = 'Email hoặc mật khẩu không đúng!';
        }
    }
}
?>
<div class="container">
    <div class="form-wrap">
        <form action="" method="POST" novalidate class="form-main">
            <h1 class="title">Đăng Nhập</h1>
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" name="email" placeholder="Email..." value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Mật Khẩu:</label>
                <input type="password" name="password" placeholder="Password..." value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
            </div>
            <span class="message-error"><?php echo isset($noti) ? $noti : ''; ?></span>
            <input name="submit" class="btn" type="submit" value="Đăng Nhập">
            <a href="/?act=forgot-pass" class="forgot-pass">Quên Mật Khẩu</a>
            <div class="form-footer">
                <p class="form-footer-text">
                    Bạn Chưa Có Tài Khoản?
                    <a href="/?act=register" class="form-footer-link">Đăng Ký</a>
                </p>
            </div>
        </form>
    </div>
</div>