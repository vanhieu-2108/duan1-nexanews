<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $full_name = $_POST['full-name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sdt = $_POST['tel'];
    $img = $_FILES['anh']['name'];
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
    $errors = [];
    if (!preg_match('/^[a-zA-Z\sàáảãạăắằẳẵặâấầẩẫậèéẻẽẹêềếểễệđìíỉĩịòóỏõọôốồổỗộơớờởỡợùúủũụưứừửữựýỳỷỹỵ]+$/u', $full_name)) {
        $errors['ten_kh'] = "Vui lòng nhập họ tên hợp lệ!";
    }
    if (empty($full_name)) {
        $errors['ten_kh'] = "Họ tên là bắt buộc!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ!";
    }
    if (empty($email)) {
        $errors['email'] = "Email là bắt buộc!";
    }
    if (!preg_match('/^[0-9]{10}+$/', $sdt)) {
        $errors['so_dien_thoai'] = "Số điện thoại không hợp lệ, vui lòng nhập tối đa 10 số.";
    }
    if (empty($sdt)) {
        $errors['so_dien_thoai'] = "Số điện thoại là bắt buộc!";
    }
    if (empty($password)) {
        $errors['password'] = "Mật khẩu là bắt buộc!";
    }
    if ($password != $confirm_password) {
        $errors['confirm_password'] = "Mật không không khớp vui lòng thử lại!";
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Nhập lại mật khẩu là bắt buộc!";
    }
    if (empty($img)) {
        $errors['anh'] = "Vui lòng chọn ảnh!";
    }
    if (empty($errors)) {
        $check = checkKhachHangByEmail($email);
        if (!is_array($check)) {
            move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
            $hasspassword = password_hash($password, PASSWORD_DEFAULT);
            addKhachHang($full_name, $email, $sdt, $hasspassword, $img);
            header("Location: /?act=login");
            exit();
        } else {
            $noti = 'Email đã tồn tại!';
        }
    }
}
?>
<div class="container">
    <div class="form-wrap">
        <form action="" method="POST" novalidate class="form-main" enctype="multipart/form-data">
            <h1 class="title">Đăng Ký</h1>
            <div class="form-group">
                <label for="username">Nhập Họ Tên</label>
                <input type="text" name="full-name" placeholder="FullName..." value="<?php echo isset($_POST['full-name']) ? htmlspecialchars($_POST['full-name']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['ten_kh']) ? $errors['ten_kh'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" name="email" placeholder="Email..." value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Số Điện Thoại</label>
                <input type="text" name="tel" placeholder="070......" value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['so_dien_thoai']) ? $errors['so_dien_thoai'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Mật Khẩu</label>
                <input type="password" name="password" placeholder="Password..." value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Nhập Lại Mật Khẩu</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password..." value="<?php echo isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : ''; ?>">
                <span class="message-error"><?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Ảnh</label>
                <input type="file" name="anh" placeholder="070......">
                <span class="message-error"><?php echo isset($errors['anh']) ? $errors['anh'] : ''; ?></span>
            </div>
            <span class="message-error"><?php echo isset($noti) ? $noti : ''; ?></span>
            <input name="submit" class="btn" type="submit" value="Đăng Ký">
            <div class="form-footer">
                <p class="form-footer-text">
                    Bạn Đã Có Tài Khoản?
                    <a href="/?act=login" class="form-footer-link">Đăng Nhập</a>
                </p>
            </div>
        </form>
    </div>
</div>