<?php get_header();

  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/post/content', get_post_format() );

    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;

  endwhile;

  get_template_part( 'template-parts/post/related', 'posts' );

get_footer(); ?>
