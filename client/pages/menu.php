<div class="menu">
    <div class="container">
        <div class="menu__inner">
            <h1 class="menu__heading">
                Menu
            </h1>
            <div class="menu__tabs">
                <div class="menu__tab-item active">
                    Món Khai Vị
                </div>
                <div class="menu__tab-item">
                    Đồ Uống
                </div>
                <div class="menu__tab-item">
                    Món Chính
                </div>
                <div class="menu__tab-item">
                    Món Tráng Miệng
                </div>
            </div>
            <div class="menu__wrapper">
                <div class="menu__products active">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                        <div class="menu__product">
                            <img src="https://source.unsplash.com/random" alt="" class="menu__img">
                            <h2 class="menu__sub-heading">
                                Lẩu Sườn Kim Chi
                            </h2>
                        </div>
                    <?php } ?>
                </div>
                <div class="menu__products">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                        <div class="menu__product">
                            <img src="https://source.unsplash.com/random" alt="" class="menu__img">
                            <h2 class="menu__sub-heading">
                                Lẩu Bò Kim Chi
                            </h2>
                        </div>
                    <?php } ?>
                </div>
                <div class="menu__products">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                        <div class="menu__product">
                            <img src="https://source.unsplash.com/random" alt="" class="menu__img">
                            <h2 class="menu__sub-heading">
                                Lẩu Hải Sản Kim Chi
                            </h2>
                        </div>
                    <?php } ?>
                </div>
                <div class="menu__products">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                        <div class="menu__product">
                            <img src="https://source.unsplash.com/random" alt="" class="menu__img">
                            <h2 class="menu__sub-heading">
                                Lẩu Tôm Kim Chi
                            </h2>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', () => {
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)
        const tabs = $$('.menu__tab-item')
        const panes = $$('.menu__products');
        [...tabs].forEach((tab, index) => {
            tab.addEventListener('click', () => {
                const pane = panes[index];
                $('.menu__tab-item.active').classList.remove('active');
                $('.menu__products.active').classList.remove('active');
                tab.classList.add('active');
                pane.classList.add('active');
            })
        })
    })
</script>