<?php get_header(); ?>

<div class="maincontent">
	<div class="container">
		<div class="content-block">
			<div class="page">
				<div class="page-header">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>
				</div>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php if ( ! is_front_page() ) { ?>
						<h2 class="entry-title"></h2>
					<?php } ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
