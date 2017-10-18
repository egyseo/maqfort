<?php
// WP_Query arguments
$args = array(
	'post_type'              => array( 'products' ),
  'posts_per_page' => 6,
  'ignore_sticky_posts' => true,
);

// The Query
$products_query = new WP_Query( $args );

if ( $products_query->have_posts() ) : ?>

  <section id="home-products">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="section-title"><span><?php _e( 'Products', 'maqfort' ); ?></span></h1>
        </div>
      </div>
      <div class="row">
        <?php
        while ( $products_query->have_posts() ) : $products_query->the_post();
          if( get_post_meta( get_the_ID(), '_maqfort_products_frontpage_checkbox', 1 ) ):
            do_action('maqfort_products_onfront');
          endif;
        endwhile;

        endif; ?>

        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
