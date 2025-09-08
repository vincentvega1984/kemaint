<?php
/*
Template Name: Мой шаблон страницы
Template Post Type: post, page, product
*/

get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">

          <?php
             // Запуск цикла страницы, который выводит содержимое.
             if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>">>

                   <?php if ( ! is_front_page() ) { ?>
                      <h2 class="entry-title"></h2>
                   <?php } ?>
                   <section class="entry-content">
                      <?php the_content(); ?>
                   </section><!-- .entry-content -->
                </article>
                <!-- #post-## -->

             <?php endwhile; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
