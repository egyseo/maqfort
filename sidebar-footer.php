<?php
/*
 * -----------------------------------------------------------
 * The theme footer widgets.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

if ( ! is_active_sidebar( 'footer' ) ) :
	return;
endif;

dynamic_sidebar( 'footer' );
