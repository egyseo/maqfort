<?php
/**
 * -----------------------------------------------------------
 * Template Name: Home Template
 * The theme homepage template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

//get_template_part( 'template-parts/home/home', 'slider' );
get_template_part( 'template-parts/home/home', 'slider2' );

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/home/home', 'products-slider' );
	get_template_part( 'template-parts/home/home', 'services' );
	get_template_part( 'template-parts/home/home', 'news' );
endwhile;

get_footer();
