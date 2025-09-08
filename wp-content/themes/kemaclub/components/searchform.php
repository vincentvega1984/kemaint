<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-form-close"></div>
    <label for="search-field">
        <span class="screen-reader-text"><?php echo esc_html_x('Search:', 'label', 'textdomain'); ?></span>
    </label>
    <div class="search-field-wrapper">
        <input type="search" id="search-field" class="search-field" placeholder="<?php echo 'Find fragrance'; ?>" name="s" required />
    </div>
    <button type="submit" class="search-submit btn-main"></button>
    <div class="search-success">
        <div class="search-success-message">
            <?php echo 'Your request is being processed, please wait.'; ?>
        </div>
        <div class="spin-loader"></div>
    </div>
</form>