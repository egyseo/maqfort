<?php
/*
* Home Page Slider
*/


$sliderShortcode = get_theme_mod( 'home_slider' );

if ( ! empty( $sliderShortcode ) ) :
	echo '<div class="slider-wrapper">' , do_shortcode( $sliderShortcode, true ) , '</div>';
endif;
