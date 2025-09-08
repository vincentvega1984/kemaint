<?php

$post_categories = get_the_category();

if (empty($post_categories)) return;

$main_category = $post_categories[0];
$show_related = get_field('show_related_categories_product_page', 'term_' . $main_category->term_id);

if (!$show_related) return;

$args = array(
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => true,
    'exclude'    => array($main_category->term_id),
    'number'     => 4,
    'parent'     => $main_category->parent
);

$sibling_categories = get_categories($args);

if ($sibling_categories) : ?>
    <h2 class="related-categories__title">
        <?php echo 'Смотрите, что есть еще!'; ?>
    </h2>
    <div class="related-categories">
        <?php foreach ($sibling_categories as $category) : ?>
            <div class="related-categories__item">
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>