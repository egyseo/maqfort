<?php
/**
 * -----------------------------------------------------------
 * Template Name: Page with no rows and columns
 * The theme page template withouht default grid system.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'norow' );
endwhile;

get_footer();
