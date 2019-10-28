<?php
/**
 * -----------------------------------------------------------
 * Template Name: About Template
 * The theme about page template.
 * -----------------------------------------------------------
 */

get_header();

$slider_shortcode = get_theme_mod( 'about_slider' );

if ( ! empty( $slider_shortcode ) ) :
	echo '<div class="slider-wrapper">' , do_shortcode( $slider_shortcode, true ) , '</div>';
endif;

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'about' );
endwhile;

get_footer();
