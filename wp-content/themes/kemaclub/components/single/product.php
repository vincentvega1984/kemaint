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
                        <?php echo 'Ask for price' ?>
                    </button>
                </div>
            </div>

            <div class="product-page__bottom">
                <?php the_content(); ?>
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
