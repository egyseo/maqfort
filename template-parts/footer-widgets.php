<?php
/**
 * -----------------------------------------------------------
 * Widgets section on the theme main footer.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<section class="footer-widgets">
	<div class="container container-fluid">
		<div class="row" >
			<?php
			if ( has_nav_menu( 'menu-products' ) ) :
				?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="products-menu-wrapper">
						<?php
						echo '<h4 class="widget-title">' , esc_html( wp_get_nav_menu_name( 'menu-products' ) ) , '</h4>';
						wp_nav_menu(
							array(
								'menu'           => __( 'Menu de Produtos', 'maqfort' ),
								'theme_location' => 'menu-products',
							)
						);
						?>
					</div><!-- .products-menu-wrapper -->
				</div><!-- .col -->
				<?php
			else :
				echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><p class="no-nav">', esc_html__( 'Adicione alguns itens ao menu principal', 'maqfort' ) , '</p></div>';
			endif;
			?>
			<?php get_sidebar( 'footer' ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .footer-widgets -->
