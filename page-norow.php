<?php
/**
 * Template Name: Page with no rows and columns
 * The theme page template.
 */
get_header();

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/content', 'norow' );

endwhile; // End of the loop

get_footer();
