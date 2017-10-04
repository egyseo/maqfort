<?php

global $post;

  $related_posts = get_post_meta( get_the_ID(), '_maqfort_related_posts_search_products', true );

  if( $related_posts ) { ?>
    <section class="related-products">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="section-title"><span><?php _e( 'Related Posts', 'maqfort' ); ?></span></h1>
          </div>
        </div>
        <div class="row">
          <?php
            foreach ( $related_posts as $post ) : setup_postdata( $GLOBALS['post'] =& $post );
          ?>
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <article class="product-card">
              <header class="product-card-header">
                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <figure class="product-card-thumbnail">
                      <?php the_post_thumbnail('maqfort-thumbnail'); ?>
                    </figure>
                  </a>
                <?php endif; ?>
              </header>
              <section class="product-card-content">
                <span class="product-card-category"><?php
                    $terms = get_the_terms( get_the_ID(), 'product-category' );
                    foreach($terms as $term) {
                      echo $term->name;
                    }
                ?></span>
                <h3 class="product-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
              </section>
              <footer class="product-card-footer">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
              </footer>
            </article><!-- article ends -->
          </div><!-- card wrapper ends -->
          <?php endforeach; } ?>
        </div><!-- row ends -->
      </div><!-- container ends -->
  </section><!-- recommended section ends -->

  <?php wp_reset_postdata();