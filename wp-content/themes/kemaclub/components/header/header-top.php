<div class="header__top">
    <div class="container">
        <div class="header__top-wrapper">
            <?php if (get_theme_mod('phone_setting', false)) : ?>
                <a class="header__top-phone" href="tel:<?php echo get_theme_mod('phone_setting'); ?>">
                    <?php echo get_theme_mod('phone_setting'); ?>
                </a>
            <?php endif; ?>
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
            <?php get_template_part( 'components/header/header-bots' ); ?>
            <div class="header__top-search">
                <?php get_template_part( 'components/searchform' ); ?>
            </div>
        </div>
    </div>
</div>
