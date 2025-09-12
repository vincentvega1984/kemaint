<?php if (!defined('ABSPATH')) {
    exit;
}

global $post;

$categories = get_the_category($post->ID);
$products_count = get_theme_mod('related_products_count', 4);

if (!$categories) {
    return;
}

$category_ids = wp_list_pluck($categories, 'term_id');

$args = array(
    'category__in'        => $category_ids,
    'post__not_in'        => array($post->ID),
    'posts_per_page'      => $products_count,
    'order'              => 'DESC',
    'orderby'            => 'date'
);

$related_query = new WP_Query($args);

if ($related_query->have_posts()) :
?>
<div class="related-products">
    <div class="related-products__title">
        <?php echo 'Related products'; ?>
    </div>
    
    <div class="related-products__grid">
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
            <div class="related-products__grid-item">
                <h2 class="related-products__grid-item-title" itemprop="name">
                    <a href="<?php the_permalink();?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif;
wp_reset_postdata();
?>