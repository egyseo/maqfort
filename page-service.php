<?php
/**
 * Template Name: Service Template
 * The theme template for service pages.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
  get_header();

  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/pages/content', 'service' );

  endwhile; // End of the loop.

  get_footer();
