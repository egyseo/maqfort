<?php
/**
 * Template Name: Page with no rows and columns
 * The theme page template.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
get_header();

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/norow', 'page' );

endwhile; // End of the loop

get_footer();
