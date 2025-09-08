<?php
$args = isset($args) ? $args : array();
$hide_date = isset($args['hide_date']) ? $args['hide_date'] : false;
?>

<div class="page-header">
    <?php dynamic_sidebar('breadcrumbs'); ?>
    <h1 class="entry-title">
        <?php the_title(); ?>
    </h1>
    <?php if (!$hide_date): ?>
        <div class="single-news-date">
            <?php echo get_the_modified_time('d.m.Y') ?>
        </div>
    <?php endif; ?>
</div>