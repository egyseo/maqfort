<?php
/**
 * -----------------------------------------------------------
 * The theme default single post template.
 * -----------------------------------------------------------
 */

get_header();

while ( have_posts() ) :

	the_post();

	get_template_part( 'template-parts/post/content', get_post_format() );

endwhile;

get_template_part( 'template-parts/post/related', 'posts' );

get_footer();
