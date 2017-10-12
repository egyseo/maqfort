<?php
/**
 * Template Name: Page with Slider
 * The theme about page template.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
get_header();

putRevSlider("about");

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/content', 'about' );

endwhile; // End of the loop

get_footer();
