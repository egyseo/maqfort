<?php get_header();

  while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/post/content', get_post_format() );
    //the_post_navigation();
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  endwhile; // End of the loop.
  get_template_part( 'template-parts/post/related', 'posts' );

get_footer(); ?>
