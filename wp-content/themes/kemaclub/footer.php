<div class="footer">
	<div class="container">
		<div class="footer__wrapper">
			<div class="footer__column">
				<?php get_template_part( 'components/footer/footer-column-contacts' ); ?>
			</div>
			<div class="footer__column">
				<div class="footer__column-title menu-title">
					<?php echo 'Товары' ?>
				</div>
				<div class="footer__column-menu">
					<?php wp_nav_menu(array('theme_location' => 'catalog-menu'));?>
				</div>
			</div>
			<div class="footer__column">
				<div class="footer__column-title menu-title">
					<?php echo 'Информация' ?>
				</div>
				<div class="footer__column-menu">
					<?php wp_nav_menu(array('theme_location' => 'footer-menu'));?>
				</div>
			</div>
			<div class="footer__column">
				<?php get_template_part( 'components/footer/footer-column-info' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'components/footer/copyright' ); ?>
<?php get_template_part( 'components/request-form-modal' ); ?>
<?php get_template_part( 'components/request-form-global-trigger' ); ?>
<?php get_template_part( 'components/call-me' ); ?>
<?php get_template_part( 'components/scroll-top' ); ?>
<div class="modal__overlay"></div>
<?php wp_footer(); ?>
