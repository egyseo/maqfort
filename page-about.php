<?php
/**
 * Template Name: About Template
 * The theme about page template.
 */
get_header();

$sliderShortcode = get_theme_mod( 'about_slider' );

if (!empty( $sliderShortcode )) :
  echo '<div class="slider-wrapper">' , do_shortcode( $sliderShortcode, true ) , '</div>';
endif;

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/content', 'about' );

endwhile; // End of the loop

get_footer();
