<?php
/**
 * -----------------------------------------------------------
 * The theme main footer template.
 * -----------------------------------------------------------
 */
?>

			</main>
			<footer id="main-footer" role="footer-wrapper" itemscope itemtype="http://schema.org/WPFooter">
				<section class="footer-widgets">
					<div class="container container-fluid">
						<div class="row" >
							<?php get_sidebar( 'footer' ); ?>
						</div>
					</div>
				</section>
				<section class="bottom-widgets">
					<div class="container container-fluid">
						<div class="row center-xs between-md between-lg middle-sm middle-md middle-lg">
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
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<?php do_action( 'mf_social' ); ?>
							</div>
						</div>
					</div>
				</section>
				<section class="copyright">
					<div class="container container-fluid">
						<div class="row">
							<div class="col-12 col-xs-12 col-sm-6 col-md-6">
								<p><?php bloginfo( 'name' ); ?> &copy; <?php echo date( 'Y' ); ?> <?php esc_html_e( ' - Todos os Direitos Reservados', 'maqfort' ); ?></p>
							</div>
							<div class="col-12 col-xs-12 col-sm-6 col-md-6">
								<div class="dev-by">
									<p><?php esc_html_e( 'Desenvolvido por:', 'maqfort' ); ?></p>
									<a href="https://crew.pt" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/crew-rgb-white.svg" alt="crew - creative web"></a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</footer>
			<a href="javascript:" id="return-to-top" rel="nofollow"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			<?php wp_footer(); ?>
		</div><!-- site-container ends -->
	</div><!-- site-wrapper ends -->
</body>
</html>
