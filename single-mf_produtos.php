<?php
/**
 * -----------------------------------------------------------
 * The theme products template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :

	the_post();

	get_template_part( 'template-parts/products/product', 'content' );

endwhile; // End of the loop.

get_footer();
