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

     endwhile; // End of the loop


    ?>



<?php get_footer();
