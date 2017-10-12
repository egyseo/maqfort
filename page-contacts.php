<?php
/**
 * Template Name: Contacts Template
 * The theme about page template.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
get_header();

while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/pages/content', 'contacts' );

endwhile; // End of the loop

get_footer();
