<body>
    <div class="container">
        <div class="form-wrap">
            <form action="" class="form-main" method="POST">
                <h1 class="title">Đăng Nhập</h1>
                <div class="form-group">
                    <label for="">Nhập Email</label>
                    <input type="text" name="email" placeholder="Email...">
                    <div class="message-error"></div>
                </div>
                <div class="form-group">
                    <label for="">Nhập Mật Khẩu</label>
                    <input type="password" name="password" placeholder="Password...">
                    <div class="message-error"></div>
                </div>
                <button class="btn" name="submit">Đăng Nhập</button>
                <a href="/?act=forgotpass" class="forgot-pass">Quên Mật Khẩu</a>
                <div class="form-footer">
                    <p class="form-footer-text">
                        Bạn Chưa Có Tài Khoản?
                        <a href="/?act=register" class="form-footer-link">Đăng Ký</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>