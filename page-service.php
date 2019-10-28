<?php
/**
 * -----------------------------------------------------------
 * Template Name: Service Template
 * The theme template for service pages.
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'service' );
endwhile;

get_footer();
