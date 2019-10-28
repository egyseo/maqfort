<?php
/*
 * -----------------------------------------------------------
 * The theme footer widgets.
 * -----------------------------------------------------------
 */

if ( ! is_active_sidebar( 'footer' ) ) :

	return;

endif;

dynamic_sidebar( 'footer' );
