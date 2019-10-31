<?php
/**
 * -----------------------------------------------------------
 * The theme default pages template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'content' );
endwhile;

get_footer();
