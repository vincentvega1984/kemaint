<?php if (get_theme_mod('address_setting', false)) : ?>
    <div class="footer__column-title">
        <?php echo 'Office adress' ?>
    </div>
    <div class="footer__column-desc">
        <?php echo get_theme_mod('address_setting'); ?>
    </div>
<?php endif; ?>
<?php if (get_theme_mod('jobtime_setting', false)) : ?>
    <div class="footer__column-title">
        <?php echo 'Office hours' ?>
    </div>
    <div class="footer__column-desc">
        <?php echo get_theme_mod('jobtime_setting'); ?>
    </div>
<?php endif; ?>