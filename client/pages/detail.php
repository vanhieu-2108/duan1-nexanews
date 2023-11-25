<?php

if (isset($_GET['ma_mon_an'])) {
    $ma_mon_an = $_GET['ma_mon_an'];
    $row = getMonAnById($ma_mon_an);
    if (is_array($row)) {
        extract($row);
    }
}

?>
<div class="container">
    <div class="content">
        <div class="content-left">
            <div class="wrap__img">
                <img src="/uploads/<?php echo isset($img) ? htmlspecialchars($img) : '' ?>" alt="">
            </div>
        </div>
        <div class="content-right">
            <h1 class="heading"><?php echo isset($ten_mon) ? htmlspecialchars($ten_mon) : '' ?></h1>
            <p class="price"><?php echo isset($gia_mon) ? htmlspecialchars(formatCurrency($gia_mon)) : '' ?> đ</p>
        </div>
    </div>
    <div class="info">
        <h2 class="sub-heading">Mô Tả</h2>
        <p class="desc">
            <?php echo isset($mo_ta) ? htmlspecialchars($mo_ta) : '' ?>
        </p>
    </div>
    <div class="comment">
        <div class="comment-top">
            <h2 class="sub-heading">Bình Luận</h2>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <div class="group-write">
                    <img src="/uploads/<?php echo $_SESSION['user']['img'] ?>" alt="" class="avatar">
                    <form action="/?act=add-comment" class="wrap-input" method="POST">
                        <div class="group-input">
                            <p class="name"><?php echo $_SESSION['user']['ten_kh'] ?></p>
                            <input type="text" name="comment" placeholder="Viết bình luận của bạn..." class="input">
                        </div>
                        <input type="hidden" name="ma_mon_an" value="<?php echo $ma_mon_an ?>">
                        <button type="submit" name="add-comment" class="btn-submit">Gửi</button>
                    </form>
                </div>
            <?php
            }
            ?>
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<a href="/?act=login" class="check-cmt">Vui lòng đăng nhập để viết bình luận!</a>';
            }
            ?>
            <div class="list-comment">
                <?php

                $rows = getListBinhLuanById($ma_mon_an);
                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        extract($row);
                        echo '
                        <div class="comment-item">
                            <img src="/uploads/' . $img . '" alt="" class="avatar">
                            <div class="group-right">
                                <p class="name">' . $ten_kh . '</p>
                                <p class="desc-cmt">' . $noi_dung . '</p>
                            </div>
                        </div>
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>