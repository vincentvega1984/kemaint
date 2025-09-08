<?php get_header(); ?>

<div class="maincontent">
	<div class="container">
			<div class="content-block">
			<div class="page">
				<div class="page-header">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
				</div>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="article-page" id="post-<?php the_ID(); ?>">
						<div class="entry-content <?php the_field('entry_content_class'); ?>">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
