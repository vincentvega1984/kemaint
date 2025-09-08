<?php get_header(); ?>

<?php
	$args = array(
		'parent' => 698,
		'hide_empty' => 0,
		'exclude' => '', // ID рубрики, которую нужно исключить
		'number' => '0',
		'orderby' => 'count',
		'order' => 'DESC',
		'pad_counts' => true
	);
	$catlist = get_terms('category',$args);
?>

<div class="maincontent front-page">
	<div class="container">
		<?php if ( is_active_sidebar( 'frontpage-message' ) ) : ?>
			<div class="frontpage-message">
				<?php dynamic_sidebar( 'frontpage-message' ); ?>
			</div>
		<?php endif; ?>

		<div class="content-block">
			<div class="page">
				<div class="page-header">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>
				<div class="mainpage-categories">
					<?php foreach ($catlist as $cat) : ?>
						<div class="mainpage-categories__item">
							<a href="<?php echo get_term_link($cat->slug, 'category'); ?>">
								<img src="<?php echo z_taxonomy_image_url($cat->term_id, ''); ?>" />
								<div class="mainpage-categories__item-title">
									<?php echo $cat->name; ?>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="article-page" id="post-<?php the_ID(); ?>">
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>

				<div class="bottom">
					<?php get_template_part('components/articles-lists'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
