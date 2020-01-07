<?php

$has_footer_1 = is_active_sidebar( 'footer-1' );
$has_footer_2 = is_active_sidebar( 'footer-2' );
$has_footer_3 = is_active_sidebar( 'footer-3' );
$has_footer_4 = is_active_sidebar( 'footer-4' ); ?>


<section class="row">
    
  <?php if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4) { ?>
							
    <aside class="col-md-3">
        <!-- appelle sidebar.php -->
        <?php if ( $has_footer_1 ) { ?>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>

						<?php } ?>
						<?php if ( $has_footer_2 ) { ?>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>

						<?php } ?>
						<?php if ( $has_footer_3 ) { ?>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>

						<?php } ?>
						<?php if ( $has_footer_4 ) { ?>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>

						<?php } ?>
    </aside>
    <?php } ?>
</section>


<footer class="row">
    <!-- appelle sidebar-footer.php -->
    <?php get_sidebar('footer');?>
</footer>

<script src="https://kit.fontawesome.com/b170d57b75.js" crossorigin="anonymous"></script>
</body>
</html>
