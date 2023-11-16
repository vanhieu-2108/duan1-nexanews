<div class="container">
    <div class="form-wrap">
        <form action="" class="form-main" enctype="multipart/form-data" method="POST">
            <h1 class="title">Đăng Ký</h1>
            <div class="form-group">
                <label for="">Nhập Email</label>
                <input type="text" name="email" placeholder="Email...">
                <div class="message-error"></div>
            </div>
            <div class="form-group">
                <label for="">Nhập Họ Tên</label>
                <input type="text" name="full-name" placeholder="FullName...">
                <div class="message-error"></div>
            </div>
            <div class="form-group">
                <label for="">Nhập Mật Khẩu</label>
                <input type="password" name="password" placeholder="Password...">
                <div class="message-error"></div>
            </div>
            <div class="form-group">
                <label for="">Nhập Lại Mật Khẩu</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password...">
                <div class="message-error"></div>
            </div>
            <div class="form-group">
                <label for="">Nhập Ảnh</label>
                <input type="file" name="avatar" placeholder="Confirm Password...">
                <div class="message-error"></div>
            </div>
            <button class="btn" name="submit">Đăng Ký</button>
            <div class="form-footer">
                <p class="form-footer-text">
                    Bạn Đã Có Tài Khoản?
                    <a href="/?act=login" class="form-footer-link">Đăng Nhập</a>
                </p>
            </div>
        </form>
    </div>
</div>