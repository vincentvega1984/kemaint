<div class="header__top-bots">
    <ul>
        <?php if (get_theme_mod('telegram_chat_url_setting', false)) : ?>
            <li>
                <a class="icofont-telegram" href="<?php echo get_theme_mod('telegram_chat_url_setting'); ?>"></a>
            </li>
        <?php endif; ?>
        <?php if (get_theme_mod('telegram_ai_url_setting', false)) : ?>
            <li>
                <a class="icofont-support" href="<?php echo get_theme_mod('telegram_ai_url_setting'); ?>"></a>
            </li>
        <?php endif; ?>
    </ul>
</div>