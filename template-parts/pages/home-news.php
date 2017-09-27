<?php

// WP_Query arguments
$args = array(
	'post_type'              => array( 'post' ),
	'post_status'            => array( 'publish' ),
	'has_password'           => false,
	'order'                  => 'DESC',
	'orderby'                => 'date',
  'posts_per_page' => 3,
  'ignore_sticky_posts' => true,
);

// The Query
$blogquery = new WP_Query( $args );

if ( $blogquery->have_posts() ) : ?>

  <section id="home-news">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="section-title"><span><?php _e( 'Notícias', 'maqfort' ); ?></span></h1>
        </div>
      </div>
      <div class="row">
        <?php
        while ( $blogquery->have_posts() ) : $blogquery->the_post();
          do_action('maqfort_card_loop');
        endwhile;
        ?>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
