<?php if (get_theme_mod('logo_header_image', false)) : ?>
    <a href="/" class="footer__logo">
        <img src="<?php echo esc_url(get_theme_mod('logo_header_image')); ?>" alt="">
    </a>
<?php endif; ?>
<?php if (get_theme_mod('phone_setting', false)) : ?>
    <a class="footer__phone" href="tel:<?php echo get_theme_mod('phone_setting'); ?>">
        <?php echo get_theme_mod('phone_setting'); ?>
    </a>
<?php endif; ?>
<?php if (get_theme_mod('email_setting', false)) : ?>
    <a class="footer__mail" href="mailto:<?php echo get_theme_mod('email_setting'); ?>">
        <?php echo get_theme_mod('email_setting'); ?>
    </a>
<?php endif; ?>
<?php if (get_theme_mod('telegram_main_url_setting', false)) : ?>
    <a class="footer__mail" href="<?php echo get_theme_mod('telegram_main_url_setting'); ?>">
        <?php echo 'Телеграм-канал Отдушки' ?>
    </a>
<?php endif; ?>
<?php if (get_theme_mod('telegram_additional_url_setting', false)) : ?>
    <a class="footer__mail" href="<?php echo get_theme_mod('telegram_additional_url_setting'); ?>">
        <?php echo 'Телеграм-канал Пищевые ингредиенты' ?>
    </a>
<?php endif; ?>