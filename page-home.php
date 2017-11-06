<?php
/**
 * Template Name: Home Page
 * The theme page template.
 */
get_header();

putRevSlider("slider1");

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/home', 'products' );

  get_template_part( 'template-parts/pages/home', 'services' );

  get_template_part( 'template-parts/pages/home', 'news' );

endwhile; // End of the loop

get_footer();
