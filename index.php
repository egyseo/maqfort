<?php get_header(); ?>

  <div class="container-fluid">
    <div class="row">

      <?php

      if ( have_posts() ) :

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/post/content', get_post_format() );

        endwhile;

        maqfort_pagination();

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif; ?>
  </div>
</div>


<?php get_footer(); ?>
