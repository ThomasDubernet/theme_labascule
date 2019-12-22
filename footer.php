</div>
<footer id="footer">
    <?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 *
 *
 * @since 0.0.1
 */

$has_footer_menu = has_nav_menu( 'footer' );

$has_footer_1 = is_active_sidebar( 'footer-1' );
$has_footer_2 = is_active_sidebar( 'footer-2' );
$has_footer_3 = is_active_sidebar( 'footer-3' );
$has_footer_4 = is_active_sidebar( 'footer-4' );

// Only output the container if there are elements to display.
if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) {
	?>

	<div class="footer-nav-widgets-wrapper footer-group">

		<div class="footer-inner section-inner">

			<?php if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_footer_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_footer_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>

						<?php } ?>
                                            <?php if ( $has_footer_3 ) { ?>

							<div class="footer-widgets column-three grid-item">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>

						<?php } ?>
                                            <?php if ( $has_footer_4 ) { ?>

							<div class="footer-widgets column-for grid-item">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
    <div id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'labascule'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
