<?php
/**
 * -----------------------------------------------------------
 * The theme cookies warining.
 * -----------------------------------------------------------
 */

$cookies_message       = get_theme_mod( 'cookies_msg' );
$cookies_readmore_link = get_theme_mod( 'cookies_read_more' );

if ( ! empty( $cookies_message ) ) :
	?>
	<div id="eu-cookie-bar">
		<div class="container container-fluid">
			<div class="row middle-xs between-xs">
				<div class="cookies-content">
					<p><?php echo esc_html( $cookies_message ); ?></p>
					<?php if ( ! empty( $cookies_readmore_link ) ) : ?>
					<div class="cookies-buttons">
						<a href="<?php echo esc_url( $cookies_readmore_link ); ?>"><?php esc_html_e( 'Ler mais', 'maqfort' ); ?></a>
						<button id="euCookieAcceptWP" onclick="euAcceptCookiesWP();"><?php esc_html_e( 'Ok, continuar', 'maqfort' ); ?></button>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
endif;
