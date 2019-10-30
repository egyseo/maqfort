<?php
/**
 * -----------------------------------------------------------
 * Extras items on the theme main footer.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<section class="footer-extras">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<?php
				if ( has_nav_menu( 'menu-footer' ) ) :
					wp_nav_menu(
						array(
							'menu'           => __( 'Footer Menu', 'maqfort' ),
							'menu_class'     => 'footer-menu',
							'theme_location' => 'menu-footer',
						)
					);
				endif;
				?>
			</div><!-- .col -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<?php do_action( 'mf_social' ); ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .bottom-widgets -->
