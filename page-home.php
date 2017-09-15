<?php
/**
 * Template Name: Home Page
 * The theme page template.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
get_header();

putRevSlider("slider1");

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/home', 'products' );

  get_template_part( 'template-parts/pages/home', 'services' );

  get_template_part( 'template-parts/pages/home', 'news' );

endwhile; // End of the loop

get_footer();
