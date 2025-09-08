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

<div class="maincontent <?php if (!empty($tags)) echo 'has-tags'?>">
	<div class="container">
		<div class="content-block">
			<div class="page">
				<div class="category-page">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>

					<div class="page-header">
						<h1 class="archive-title">
							<?php single_cat_title(); ?>
						</h1>
						<?php if (!empty($tags)){ ?>
							<div class="category-page-tags__trigger">
								<?php echo 'Фильтры' ?>
							</div>
						<?php } ?>
					</div>
					
					<div class="listing-wrapper products">
						<?php if (!empty($tags)){ ?>
							<div class="category-page-tags">
								<div class="close"></div>
								<div class="wrapper">
									<?php foreach($tags as $tag_id => $tag_name)
										$tags_print[] = '<a href="' .get_tag_link($tag_id). '">' .$tag_name. '</a>';
										if (isset($tags_print)) {
											echo implode('', $tags_print);
										}
									?>
								</div>
							</div>
						<?php } ?>

						<div class="listing-wrapper__maincontent">
							<?php if (!empty($catlist)) : ?>
								<div class="categories">
									<?php foreach ($catlist as $cat) : ?>
										<div class="categories__item <?php echo $cat->slug; ?>">
												<a href="<?php echo get_term_link($cat->slug, 'category'); ?>">
													<?php if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url($cat->term_id, '')) {
														echo '<div class="categories__image">
															<img src="' . esc_url(z_taxonomy_image_url($cat->term_id, '')) . '" alt="' . esc_attr($cat->name) . '" />
														</div>';
													} ?>
													<div class="categories__item-title"><?php echo $cat->name; ?></div>
												</a>
										</div>
									<?php endforeach; ?>
								</div>
							<?php else: ?>
                                <div class="listing-posts">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <div class="post-wrap">
                                                <h2 class="post-title" itemprop="name">
                                                    <a href="<?php the_permalink();?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                            </div>
                                        <?php endwhile; ?>

                                    <?php else: ?>
                                        <p>
                                            <?php echo "Извините, но в данной категории нет товаров." ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
								
								<?php
									the_posts_pagination( array(
									'prev_text'          => __( '←' ),
									'next_text'          => __( '→' ),
									) );
								?>
                            <?php endif; ?>
						</div>
					</div>
					<?php get_template_part( 'components/request-form-static' ); ?>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>