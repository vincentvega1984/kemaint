<?php get_header(); ?>

<?php
	$current_category = get_queried_object();
	$posts_categories = ['news'];
?>

<?php if (in_array($current_category->slug, $posts_categories)) : ?>
	<?php get_template_part('components/posts-category-layout'); ?>
<?php else: ?>
	<?php if ($current_category->slug === 'catalog') : ?>
		<?php get_template_part('components/katalog-page-layout'); ?>
	<?php else: ?>
		<?php get_template_part('components/products-category-layout'); ?>
	<?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>
