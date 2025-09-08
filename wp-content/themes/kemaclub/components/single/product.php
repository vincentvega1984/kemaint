<?php
    $productStaticAttributes = get_product_attributes();
    $args = array(
        'hide_date' => true
    );
?>

<div class="page">
    <?php get_template_part('components/single/single-page-header', null, $args); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="product-page" id="post-<?php the_ID(); ?>">
            <div class="product-page__top">
                <div class="product-page__media">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php else : ?>
                        <div class="post-no-image">
                            <img src="<?php echo esc_url(get_theme_mod('logo_header_image')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="product-page__attributes">
                    <?php $field = get_field_object('sku');
                        if( get_field('sku') ): ?>
                        <div class="product-page__attribute">
                            <div class="product-page__attribute-label">
                                <?php echo $field['label']; ?>
                            </div>
                            <div class="product-page__attribute-value">
                                <?php echo $field['value']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($productStaticAttributes)) { ?>
                        <?php foreach ($productStaticAttributes as $attr) { ?>
                            <div class="product-page__attribute">
                                <div class="product-page__attribute-label">
                                    <?php echo esc_html($attr->label); ?>
                                </div>
                                <div class="product-page__attribute-value">
                                    <?php echo esc_html($attr->value); ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <button class="product-page__request-btn btn-main request-form-trigger">
                        <?php echo 'Купить' ?>
                    </button>
                </div>
            </div>

            <?php if (get_theme_mod('wholesale_order_setting', false)) : ?>
                <div class="product-page__wholesale-order">
                    <h3><?php echo 'Оптовый заказ' ?></h3>
                    <?php echo get_theme_mod('wholesale_order_setting'); ?>
                </div>
            <?php endif; ?>

            <div class="product-page__bottom">
                <div class="product-page__tabs">
                    <nav class="product-page__tabs-nav">
                        <ul>
                            <li>
                                <button data-tab="1" class="active">
                                    <?php echo 'Описание' ?>
                                </button>
                            </li>
                            <li>
                                <button data-tab="2">
                                    <?php echo 'Характеристики' ?>
                                </button>
                            </li>
                            <li>
                                <button data-tab="3">
                                    <?php echo 'Доставка и оплата' ?>
                                </button>
                            </li>
                        </ul>
                    </nav>
                    <div class="product-page__tabs-panels">
                        <div class="product-page__tabs-panel active" data-panel="1">
                            <?php the_content(); ?>
                        </div>
                        <div class="product-page__tabs-panel" data-panel="2">
                            <?php get_template_part('components/single/product-characteristics-tab'); ?>
                        </div>
                        <div class="product-page__tabs-panel" data-panel="3">
                            <?php $embedded_post_id = get_theme_mod('embedded_post_id', '');
                                if ($embedded_post_id) {
                                    $post = get_post($embedded_post_id);
                                    if ($post) {
                                        echo apply_filters('the_content', $post->post_content);
                                    } else {
                                        echo '<p>Запись о Доставке и оплате не найдена</p>';
                                    }
                                } else {
                                    echo '<p>Запись о Доставке и оплате не выбрана</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ( is_singular() ) :
                echo get_the_tag_list(
                    '<div class="product-page__tags"><div>',
                    '</div><div>',
                    '</div></div>',
                    get_queried_object_id()
                );
            endif; ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php if ( get_theme_mod( 'related_products_switcher', true ) ) : ?>
        <?php get_template_part( 'components/single/related-products' ); ?>
    <?php endif; ?>
    <?php get_template_part( 'components/single/related-categories' ); ?>
    <?php get_template_part( 'components/request-form-static' ); ?>
</div>
