<?php
	$cat_id = get_query_var('cat');
	$tags = get_tags_in_cat($cat_id);
	$args = array(
		'parent' => $cat_id,
		'hide_empty' => 1,
		'exclude' => '',
		'number' => '0',
		'orderby' => 'count',
		'order' => 'DESC',
		'pad_counts' => true
	);
	$catlist = get_terms('category',$args);
?>

<div class="maincontent">
	<div class="container">
		<div class="content-block">
			<div class="page">
				<div class="category-page">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>

					<div class="page-header">
						<h1 class="archive-title">
							<?php single_cat_title(); ?>
						</h1>
					</div>
					
					<div class="listing-wrapper root">
						<div class="listing-wrapper__maincontent">
							<?php if (!empty($catlist)) : ?>
								<div class="categories">
									<?php foreach ($catlist as $cat) : ?>
										<div class="categories__item <?php echo $cat->slug; ?>">
												<a href="<?php echo get_term_link($cat->slug, 'category'); ?>">
													<img src="<?php echo z_taxonomy_image_url($cat->term_id, ''); ?>" />
													<div class="categories__item-title"><?php echo $cat->name; ?></div>
												</a>
										</div>
									<?php endforeach; ?>
								</div>
                            <?php endif; ?>
						</div>
					</div>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>