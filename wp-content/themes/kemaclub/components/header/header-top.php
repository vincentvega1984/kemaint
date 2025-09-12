<div class="header__top">
    <div class="container">
        <div class="header__top-wrapper">
            <?php if (get_theme_mod('email_setting', false)) : ?>
                <a class="header__top-mail" href="mailto:<?php echo get_theme_mod('email_setting'); ?>">
                    <?php echo get_theme_mod('email_setting'); ?>
                </a>
            <?php endif; ?>
            <?php if (get_theme_mod('adress_setting', false)) : ?>
                <div class="header__top-adress">
                    <?php echo get_theme_mod('adress_setting'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
