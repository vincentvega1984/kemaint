<?php

// Add support of title tag

add_theme_support( 'title-tag' );

add_theme_support('editor-style');
add_theme_support('wp-block-styles');
add_theme_support('align-wide');


// Preload fonts to prevent jumping

function preload_custom_fonts() {
    ?>
    	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/fonts/Gilroy/Gilroy-Bold.woff2" as="font" type="font/woff2" crossorigin>
    	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/fonts/Gilroy/Gilroy-Medium.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/fonts/Gilroy/Gilroy-Regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/fonts/FontAwesome/fontawesome-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/fonts/Icofont/icofont.woff2" as="font" type="font/woff2" crossorigin>
	<?php
}
add_action('wp_head', 'preload_custom_fonts', 1);

// Include CSS styles

function kema_theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'kema_theme_enqueue_styles');

// Include main.js into template

add_action('wp_enqueue_scripts', function () {

    wp_register_script('mainjs', get_stylesheet_directory_uri() . '/js/main.js');
    wp_enqueue_script('mainjs');
});

show_admin_bar(false);

// Remove junk from head

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// custom excerpt length

function custom_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// custom excerpt ellipses for 2.9+

function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

//Disable adminbar styles on front

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

// no more jumping for read more link

function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');

foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}

// category id in body and post class

function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

// get the first category id

function get_first_category_ID() {
	$category = get_the_category();
	return $category[0]->cat_ID;
}

function my_theme_wrapper_start() {
  echo '<div class="content-block">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

//change read more link text

add_filter( 'the_content_more_link', 'modify_read_more_link' );
	function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Подробнее...</a>';
}

function get_tags_in_cat($cat_id) {
    $posts = get_posts( array('category' => $cat_id, 'numberposts' => -1) );
    $tags = array();
  
    foreach($posts as $post) {
        $post_tags = get_the_tags($post->ID);
        if( !empty($post_tags) )
            foreach($post_tags as $tag)
                $tags[$tag->term_id] = $tag->name;
      
    }
    asort($tags);
    return $tags;
}

function replace_excerpt($content) {
	return str_replace('Continue Reading', '<a href="'. get_permalink() .'">Читать далее</a>',
	$content ); 
}
add_filter('the_excerpt', 'replace_excerpt');

// Move the Privacy Policy help notice back under the title field. 
add_action( 'admin_init', function(){ remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] ); 
add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] ); } ); 

// Области для меню

function register_mega_menu() {
    register_nav_menu('mega-menu', __('Мега меню'));
}
add_action('init', 'register_mega_menu');

function register_main_menu() {
    register_nav_menu('main-menu', __('Главное меню'));
}
add_action('init', 'register_main_menu');

function register_catalog_menu() {
    register_nav_menu('catalog-menu', __('Меню каталога'));
}
add_action('init', 'register_catalog_menu');

function register_footer_menu() {
    register_nav_menu('footer-menu', __('Меню в футере'));
}
add_action('init', 'register_footer_menu');

// Виджеты

// Подключаем виджеты к теме

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<span class="widgettitle">',
		'after_title' => '</span>',
	));
}

register_sidebar(array(
	'name' => __('Хлебные крошки'),
	'id' => 'breadcrumbs',
	'description' => __('Навигатор сайта'),
	'before_widget' => '',
	'after_widget' => '',
));

register_sidebar(array(
	'name' => __('Информационные сообщения'),
	'id' => 'info-message',
	'description' => __('Позиция для вывода информационных сообщений'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));

register_sidebar(array(
	'name' => __('Сообщения на главной'),
	'id' => 'frontpage-message',
	'description' => __('Позиция для вывода сообщений на главной странице'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));

add_filter('widget_text', 'do_shortcode');

function custom_menu_page_removing() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

function mk_remove_prev_link( $data ) {
	return false;
}
add_filter( 'prev_link', 'mk_remove_prev_link' );
add_filter( 'next_link', 'mk_remove_prev_link' );


add_filter('wpseo_canonical', 'removeCanonicalArchivePagination');
 
function removeCanonicalArchivePagination($link) {
    $link = preg_replace('#\\??/page[\\/=]\\d+#', '', $link);
    return $link;
};

if ( ! function_exists( 'main_setup' ) ) :
function main_setup() {
	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link //developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
}
endif;
add_action( 'after_setup_theme', 'main_setup' );

// Alphabetical sort for product cats only

function foo_modify_query_order( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
	if ( !is_category('stati') && !is_category('novosti')) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'foo_modify_query_order' );

require_once get_template_directory() . '/inc/theme-settings.php';

// Убрали обертку из блока partner-cards-wrapper

add_filter(
    'lazyblock/partner-cards-wrapper/allow_inner_blocks_wrapper',
    '__return_false'
);

// Функция для получения статических атрибутов продукта 

function get_product_attributes() {
    $attribute_ids = ['manufacturer', 'brand', 'expiry'];
    $result = [];

    foreach ($attribute_ids as $id) {
        $label = get_theme_mod("attribute_{$id}_label");
        $value = get_theme_mod("attribute_{$id}_value");

        if ($label && $value) {
            $result[] = (object) [
                'label' => $label,
                'value' => $value,
            ];
        }
    }

    return $result;
}