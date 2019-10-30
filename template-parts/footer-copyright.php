<?php
/**
 * -----------------------------------------------------------
 * The copyright section in the theme main footer.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<section class="copyright">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-12 col-xs-12 col-sm-6 col-md-6">
				<p><?php bloginfo( 'name' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( ' - Todos os Direitos Reservados', 'maqfort' ); ?></p>
			</div><!-- .col -->
			<div class="col-12 col-xs-12 col-sm-6 col-md-6">
				<div class="dev-by">
					<p><?php esc_html_e( 'Desenvolvido por:', 'maqfort' ); ?></p>
					<a href="https://crew.pt" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/crew-rgb-white.svg" alt="crew - creative web"></a>
				</div><!-- .de-by -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .copyright -->
