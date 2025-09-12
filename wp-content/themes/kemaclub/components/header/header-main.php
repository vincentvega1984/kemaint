<div class="header__main">
    <div class="container">
        <div class="header__main-wrapper">
            <?php if (get_theme_mod('logo_header_image', false)) : ?>
                <a href="/" class="header__main-logo">
                    <img src="<?php echo esc_url(get_theme_mod('logo_header_image')); ?>" alt="">
                </a>
            <?php endif; ?>
            <div class="header__main-menu">
                <div class="header__main-menu-mobile-nav">
                    <div class="header__main-menu-mobile-nav-back">
                        <?php echo 'Назад' ?>
                    </div>
                    <div class="header__main-menu-mobile-nav-current"></div>
                    <a href="" class="header__main-menu-mobile-nav-all">
                        <strong>
                            <?php echo 'Все товары категории' ?>
                        </strong>
                    </a>
                </div>
                <?php wp_nav_menu( array('theme_location' => 'main-menu'));?>
            </div>
            <button class="btn-main request-form-trigger">
                <?php echo 'Ask for prices' ?>
            </button>
            <button class="header__main-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</div>
