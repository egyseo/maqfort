<?php
/**
 * Template Name: Home Page
 * The theme page template.
 *
 * @package AMOB
 * @since AMOB Theme 1.0
 *
 */
get_header(); ?>

    <?php putRevSlider("slider1") ?>
    <?php while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/pages/home', 'products' );

      get_template_part( 'template-parts/pages/home', 'services' );

      get_template_part( 'template-parts/pages/home', 'news' );

     endwhile; // End of the loop


    ?>



<?php get_footer();
