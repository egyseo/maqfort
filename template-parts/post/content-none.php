<?php
/**
 * -----------------------------------------------------------
 * Template to display that posts wanst been found.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<section class="no-results-page">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<header>
					<h1><?php esc_html_e( 'Não encontramos nada. :(', 'maqfort' ); ?></h1>
				</header>
				<section>
					<?php
					if ( is_home() && current_user_can( 'publish_posts' ) ) :
						?>
						<p><?php printf( wp_kses( __( 'Ready to write your first post? <a href="%1$s">Start here</a>.', 'maqfort' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
						<?php elseif ( is_search() ) : ?>
							<p><?php esc_html_e( 'Pedimos desculpa, mas não encontramos nada. Tente por favor com uma palavra diferente.', 'maqfort' ); ?></p>
							<?php get_search_form(); ?>
							<a class="btn btn-secondary" href="<?php echo get_home_url(); ?>"><?php _e( 'Ir para o início', 'maqfort' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						<?php else : ?>
							<p><?php esc_html_e( 'Não conseguimos encontrar o que procura, talvez uma pesquisa possa ajudá-lo.', 'maqfort' ); ?></p>
							<?php get_search_form(); ?>
							<a class="btn btn-secondary" href="<?php echo get_home_url(); ?>"><?php _e( 'Ir para o início', 'maqfort' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						<?php
					endif;
					?>
				</section><!-- .pagecontent? -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .no-results-page -->
