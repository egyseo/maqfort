<?php
// WP_Query arguments
$args = array(
	'post_type'              => array( 'products' ),
  'posts_per_page' => 200,
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="flex-products">
            <ul class="slides">
              <?php
              while ( $products_query->have_posts() ) : $products_query->the_post();
                do_action('maqfort_products_onfront');
              endwhile;

              endif; ?>

              <?php wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
