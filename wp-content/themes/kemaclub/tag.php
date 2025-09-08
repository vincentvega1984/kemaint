<?php /* Template Name: Tag Archive */ ?>

<?php get_header(); ?>
<div>
	<div class="maincontent has-tags">
		<div class="container">
			<div class="page">
				<div class="category-page">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>
					<div class="page-header">
						<h1 class="entry-title"><?php echo single_tag_title(); ?></h1>
						<div class="category-page-tags__trigger">
							<?php echo 'Фильтры' ?>
						</div>
					</div>

					<div class="listing-wrapper">
						<div class="category-page-tags">
							<div class="close"></div>
							<div class="wrapper">
								<?php wp_tag_cloud('smallest=12&largest=36&number=1500&format=flat&orderby=name'); ?>
							</div>
						</div>

						<div class="listing-wrapper products">
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
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
