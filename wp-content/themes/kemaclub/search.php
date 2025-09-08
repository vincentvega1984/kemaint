<?php 
get_header(); 

/**
 * Получает правильную форму слова "результат" в зависимости от количества
 * 
 * @param int $count Количество результатов
 * @return string Правильная форма слова
 */
function get_search_results_text($count) {
    $last_digit = $count % 10;
    $last_two_digits = $count % 100;
    
    if ($count == 0) {
        return 'ничего не найдено';
    }
    elseif ($last_two_digits >= 11 && $last_two_digits <= 19) {
        return $count . ' результатов';
    }
    elseif ($last_digit == 1) {
        return $count . ' результат';
    }
    elseif ($last_digit >= 2 && $last_digit <= 4) {
        return $count . ' результата';
    }
    else {
        return $count . ' результатов';
    }
}

// Получаем исключённые категории из настроек темы
$excluded_cats = get_theme_mod('excluded_search_categories', '');
$excluded_categories = !empty($excluded_cats) ? array_map('intval', explode(',', $excluded_cats)) : array();

// Получаем данные поиска с исключением категорий
$search_query = get_search_query();
$allsearch_args = array(
    's' => $search_query,
    'showposts' => -1,
    'category__not_in' => $excluded_categories
);
$allsearch = new WP_Query($allsearch_args);
$search_count = $allsearch->post_count;
wp_reset_query();

// Аргументы для основного цикла с исключением категорий
$main_query_args = array(
    'category__not_in' => $excluded_categories
);
query_posts(array_merge($wp_query->query_vars, $main_query_args));
?>

<div class="maincontent">
    <div class="container">
        <div class="content-block">
            <div class="page">
                <div class="category-page">
                    <?php dynamic_sidebar('breadcrumbs'); ?>

                    <div class="page-header">
                        <h1 class="archive-title">
                            По Вашему запросу "<span class="search-terms"><?php echo esc_html($search_query); ?></span>" &mdash; 
                            <?php echo get_search_results_text($search_count); ?>
                        </h1>
                    </div>
                    
                    <div class="listing-wrapper products">
                        <div class="listing-posts">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="post-wrap">
                                        <h2 class="post-title" itemprop="name">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
					<?php
						the_posts_pagination( array(
						'prev_text'          => __( '←' ),
						'next_text'          => __( '→' ),
						) );
					?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
wp_reset_query(); 
get_footer(); 
?>