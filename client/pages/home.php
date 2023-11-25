<div class="hero">
    <div class="hero__inner">
        <div class="hero__left">
            <img src="../../imgs/hero-1.png" alt="" class="hero-img">
        </div>
        <div class="hero__middle">
            <p class="hero__desc">Chào mừng đến với nhà hàng của chúng tôi</p>
            <h1 class="hero__heading">
                Món Ăn Tốt Nhất Cho Những Khoảnh Khắc Đẹp Nhất
            </h1>
            <p class="hero__desc">
                Chúng ta có những đầu bếp và ngôi sao nổi tiếng—Julia Child, Sophia Loren, Virginia Woolf—để cảm ơn vì một số câu trích dẫn về ẩm thực hay nhất mọi thời đại.
            </p>
        </div>
        <div class="hero__right">
            <img src="../../imgs/hero-2.png" alt="" class="hero-img">
        </div>
    </div>
</div>
<div class="about">
    <div class="container">
        <div class="about__inner">
            <div class="about__left">
                <img src="/imgs/about-1.png" alt="" class="about__img-1">
                <img src="/imgs/about-2.png" alt="" class="about__img-2">
            </div>
            <div class="about__right">
                <h2 class="about__heading">
                    Về Chúng Tôi
                </h2>
                <p class="about__desc">
                    Trong khi thưởng thức bữa ăn, khách hàng có thể tận hưởng không gian ấm cùng và đầy âm nhạc của nhà hàng.Một số nhà hàng còn có các chương trình giải trí như ca nhạc, múa hát, những tiết mục trình diễn nghệ thuật để tạo ra một không khí vui tươi và đầy sôi động cho khách hàng.
                </p>
                <div class="about__desc">
                    Thứ hai - Chủ nhật <strong>8:00AM - 11:00PM</strong>
                </div>
                <div class="about__phone">
                    <a style="color: #333;" href="tel:+1-978-082-1111">+1-978-082-1111</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <div class="container">
        <div class="menu__inner">
            <h2 class="menu__heading">
                Our Menu
            </h2>
            <div class="menu__list">
                <?php
                $rows = getAllMonAn();
                $rows = array_slice($rows, 0, 6);
                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        extract($row);
                        echo '
                <div class="menu__item">
                    <div class="menu__item-left">
                    <div class="menu__item-group">
                        <div class="menu-name">
                            ' . $ten_mon . '
                        </div>
                        <div class="menu-price">
                            ' . formatCurrency($gia_mon) . ' 
                        </div>
                    </div>
                    <a href="/?act=detail&ma_mon_an=' . $ma_mon_an . '" class="menu__link">
                        Xem thêm
                    </a>
                </div>
                <div class="menu__item-right">
                    <img src="/uploads/' . $img . '" alt="">
                </div>
                    </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="book" style="padding: 0;">
    <div class="container">
        <div class="book__inner" style="margin-top: 100px;">
            <form action="/?act=confirm" class="book-form" method="POST" autocomplete="off">
                <div class="book_group">
                    <div class="book-left">
                        <h2 class="book__heading">Đặt Bàn</h2>
                        <div class="book__form-group">
                            <label for="">Tên Người Đặt</label>
                            <input required type="text" class="book__form-input" name="full-name" value="<?php echo isset($_SESSION['user']['ten_kh']) ?  $_SESSION['user']['ten_kh'] : '' ?>">
                        </div>
                        <div class="book__form-group">
                            <label for="">Email</label>
                            <input required type="text" class="book__form-input" name="email" value="<?php echo isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : '' ?>">
                        </div>
                        <div class="book__form-group">
                            <label for="">Số Điện Thoại</label>
                            <input required type="text" class="book__form-input" name="tel" value="<?php echo isset($_SESSION['user']['so_dt']) ? $_SESSION['user']['so_dt'] : '' ?>">
                        </div>
                        <div class="book__form-group">
                            <label for="">Ngày</label>
                            <input required type="date" class="book__form-input" name="date" value="<?php echo isset($_SESSION['user']) ? date('Y-m-d') : '' ?>">
                        </div>
                        <div class="book__form-group">
                            <label for="">Giờ</label>
                            <input required type="text" class="book__form-input" name="hour">
                        </div>
                        <div class="book__form-group">
                            <label for="">Số Bàn</label>
                            <select required name="quantitytable" id="" style="padding: 13px 10px; outline: none;" class="form-control">
                                <option disabled value="" selected>--Chọn Số Bàn--</option>
                                <?php
                                $rows = getAllBanByStatus(0);
                                if (is_array($rows)) {
                                    foreach ($rows as $row) {
                                        extract($row);
                                        echo '<option value="' . $ma_ban . '">Bàn Số: ' . $so_ban . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="book__form-group">
                            <label for="">Số Người</label>
                            <input required type="text" class="book__form-input" name="countperson">
                        </div>
                    </div>
                    <div class="book-right">
                        <h2 class="book__heading">Chọn Món</h2>
                        <div class="tabs">
                            <?php
                            $count = 0;
                            $rows = getAllLoaiMon();
                            if (is_array($rows)) {
                                foreach ($rows as $row) {
                                    extract($row);
                                    if ($count == 0) {
                                        echo '
                                        <div class="tab_item active">
                                            <p class="tab_item-name">
                                                ' . $ten_loai . '
                                            </p>
                                        </div>
                                        ';
                                    } else {
                                        echo '
                                        <div class="tab_item">
                                            <p class="tab_item-name">
                                                ' . $ten_loai . '
                                            </p>
                                        </div>
                                        ';
                                    }
                                    $count = 1;
                                }
                            }
                            ?>
                        </div>
                        <div class="tab-panes">
                            <?php
                            $count = 0;
                            $rows = getAllLoaiMon();
                            if (is_array($rows)) {
                                foreach ($rows as $row) {
                                    extract($row);
                                    if ($count == 0) {
                                        echo '<div class="tab-pane active">';
                                    } else {
                                        echo '<div class="tab-pane">';
                                    }
                                    renderFoodClient($ten_loai);
                                    echo '</div>';
                                    $count = 1;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <button style="margin-top: 20px;" name="submit" type="submit" class="book__form-btn">
                    Đặt
                </button>
            </form>
        </div>
    </div>
    <div id="toast">Đặt Bàn Thanh Công <i class="fa-solid fa-check"></i></div>
    <script>
        window.addEventListener('load', () => {
            const $ = document.querySelector.bind(document)
            const $$ = document.querySelectorAll.bind(document)
            const tabs = $$('.tabs .tab_item')
            const panes = $$('.tab-panes .tab-pane');
            [...tabs].forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    const pane = panes[index];
                    $('.tab_item.active').classList.remove('active');
                    $('.tab-pane.active').classList.remove('active');
                    tab.classList.add('active');
                    pane.classList.add('active');
                })
            })
        })

        function showToast() {
            const toast = document.getElementById('toast');
            toast.classList.add('active');
        }
        <?php
        if (isset($_SESSION['orderSuccessMessage'])) {
            $orderSuccessMessage = $_SESSION['orderSuccessMessage'];
            // Hiển thị thông báo thành công, ví dụ, sử dụng JavaScript để hiển thị toast
            echo "showToast()";
            // Xóa thông báo từ session để tránh hiển thị nhiều lần
            unset($_SESSION['orderSuccessMessage']);
        }
        ?>
    </script>