<?php get_header(); ?>

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
					
					<div class="listing-wrapper">
						<div class="listing-wrapper__maincontent">
							<div class="listing-posts parent">
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="post-wrap">
											<h2 class="post-title" itemprop="name">
												<a href="<?php the_permalink();?>">
													<?php the_title(); ?>
												</a>
											</h2>
											<div class="news-date">
												<?=get_the_date('d.m.Y')?>
											</div>
											<div class="post-content">
												<?php the_excerpt(); ?>
											</div>
										</div>
									<?php endwhile; ?>

                                <?php else: ?>
                                    <p>
                                        <?php echo "Извините, но в данной категории нет материалов." ?>
                                    </p>
                                <?php endif; ?>
							</div>
						</div>
					</div>

					<?php
						the_posts_pagination( array(
						'prev_text'          => __( '←' ),
						'next_text'          => __( '→' ),
						) );
					?>
					<?php get_template_part( 'components/request-form-static' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>