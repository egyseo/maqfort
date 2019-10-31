<?php
/**
 * -----------------------------------------------------------
 * Template Name: Contacts Template
 * The theme template for the contacts page.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */


get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'contacts' );
endwhile;

get_footer();
