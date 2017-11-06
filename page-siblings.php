<?php
/**
 * Template Name: Siblings Pages
 * The theme template for pages with siblings.
 */
  get_header();

  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/pages/siblings', 'page' );

  endwhile; // End of the loop.

  get_footer();
