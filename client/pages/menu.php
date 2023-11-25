<div class="menu">
    <div class="container">
        <div class="menu__inner">
            <h1 class="menu__heading">
                Menu
            </h1>
            <form action="" method="POST" class="form-search">
                <input value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>" placeholder="Tìm kiếm món ăn" type="text" name="search" class="input-search">
                <button class="icon-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="menu__wrapper">
                <div class="menu__products">
                    <?php
                    if (isset($_POST['search'])) {
                        $search = $_POST['search'];
                        $rows = searchMonAnByName($search);
                    } else {
                        $rows = getAllMonAn('DESC');
                    }
                    if (is_array($rows)) {
                        foreach ($rows as $row) {
                            extract($row);
                            echo '<div class="menu__product">
                                    <div class="wrap-img">
                                        <a href="/?act=detail&ma_mon_an=' . $ma_mon_an . '">
                                            <img src="/uploads/' . $img . '" alt="" class="menu__img">
                                        </a>
                                    </div>
                                    <h2 class="menu__sub-heading">
                                        <a style="color: black" href="/?act=detail&ma_mon_an=' . $ma_mon_an . '">
                                        ' . $ten_mon . '
                                        </a>
                                    </h2>
                                    <p class="menu-price">' . formatCurrency($gia_mon) . ' đ</p>
                                </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>