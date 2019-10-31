<?php
/**
 * -----------------------------------------------------------
 * Template Name: Page with childs
 * the theme template for pages with siblings.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/pages/page', 'childs' );
endwhile;

get_footer();
