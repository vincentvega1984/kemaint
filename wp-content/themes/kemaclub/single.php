<?php 
	get_header(); 
	$post_cats = get_theme_mod('excluded_search_categories', '');
	$post_categories = !empty($post_cats) ? array_map('intval', explode(',', $post_cats)) : array();
	$is_post = !empty($post_categories) && has_category($post_categories);
?>
<div class="maincontent">
	<div class="container">
  		<div class="content-block">
			<?php if ($is_post) {
				get_template_part('components/single/post');
			} else {
				get_template_part('components/single/product');
			} ?>
  		</div>
	</div>
</div>
<?php get_footer();
