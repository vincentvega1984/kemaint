<?php 
    $args = array(
        'hide_date' => false
    );
?>
<div class="page">
    <?php get_template_part('components/single/single-page-header', null, $args); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="article-page" id="post-<?php the_ID(); ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php if ( get_theme_mod( 'related_posts_switcher', true ) ) : ?>
        <?php get_template_part( 'components/single/related-posts' ); ?>
    <?php endif; ?>
    <?php get_template_part( 'components/request-form-static' ); ?>
</div>
