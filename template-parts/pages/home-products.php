<?php

global $post;

$products_list = get_post_meta( get_the_ID(), '_mf_products_list_product', true );

if( $products_list ) { ?>
  <?php $title_url = get_post_type_archive_link( 'produtos' ); ?>
  <section id="home-products">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 class="section-title"><span><a href="<?php echo $title_url; ?>"><?php _e( 'Produtos', 'maqfort' ); ?></a></span></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="flex-products">
            <ul class="slides">
        <?php foreach ( $products_list as $post ) : setup_postdata( $GLOBALS['post'] =& $post ); ?>
          <li>
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
                <h3 class="product-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
              </section>
              <footer class="product-card-footer">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
              </footer>
            </article><!-- article ends -->
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      </div>
      </div>
    </div>
  </section>
<?php }

wp_reset_postdata();
