<?php if (!defined('ABSPATH')) {
    exit;
}

global $post;

$categories = get_the_category($post->ID);
$posts_count = get_theme_mod('related_posts_count', 4);

if (!$categories) {
    return;
}

$category_ids = wp_list_pluck($categories, 'term_id');

$args = array(
    'category__in'       => $category_ids,
    'post__not_in'       => array($post->ID),
    'posts_per_page'     => $posts_count,
    'order'              => 'DESC',
    'orderby'            => 'date'
);

$related_query = new WP_Query($args);

if ($related_query->have_posts()) :
?>

<div class="cross-posts">
    <div class="cross-posts__title">
        <?php echo 'Вам также может быть интересно'; ?>
    </div>
    <ul>
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>
        <?php endwhile; ?> 
    </ul>
</div>

<?php endif;
wp_reset_postdata();
?>