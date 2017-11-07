<?php get_header(); ?>
  <div class="container container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h1><?php _e( 'News', 'maqfort' ); ?></h1>
        <p><?php _e( 'Follow our last news and keep in touch with the world of machines and tools!', 'maqfort' ); ?></p>
      </div>
    </div>
    <div class="row">

      <?php

      if ( have_posts() ) :

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/post/content', 'card' );

        endwhile;

        maqfort_pagination();

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif; ?>

    </div>
  </div>


<?php get_footer(); ?>
