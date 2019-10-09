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

<?php $title_url = get_permalink( get_option( 'page_for_posts' ) ); ?>

  <section id="home-news">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 class="section-title"><span><a href="<?php echo $title_url; ?>"><?php _e( 'Notícias', 'maqfort' ); ?></a></span></h2>
        </div>
      </div>
      <div class="row">
        <?php
        while ( $blogquery->have_posts() ) : $blogquery->the_post();
          do_action('mf_card_loop');
        endwhile;
        ?>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
