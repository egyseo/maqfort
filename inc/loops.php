<?php

/*
 * -----------------------------------------------------------
 * 1.0 Home page news loop.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'maqfort_news_card_loop' ) ) {

  function maqfort_news_card_loop() { ?>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
      <a href="<?php the_permalink(); ?>" class="card-link">
        <article class="post-card">
          <header class="card-header">
            <?php if ( has_post_thumbnail() ) : ?>
                <figure class="card-thumbnail">
                  <?php the_post_thumbnail('small'); ?>
                </figure>
                <div class="card-date">
                  <span class="day"><?php the_time('d'); ?></span>
                  <span class="month"><?php the_time('M'); ?></span>
                </div>
            <?php endif; ?>
          </header>

          <section class="card-body">
            <h3 class="card-title"><?php the_title(); ?></h3>

            <?php the_excerpt(); ?>
            <?php //amob_post_meta(); ?>
          </section>
        </article>
      </a>
    </div>

  <?php }

  add_action( 'maqfort_card_loop', 'maqfort_news_card_loop' );

}

/*
 * -----------------------------------------------------------
 * 2.0 Products home page loop
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'maqfort_products_onfront_loop' ) ) {

  function maqfort_products_onfront_loop() { ?>

    <?php //if( get_post_meta( get_the_ID(), '_amobft_checkbox', 1 ) ): ?>
      <li>
        <article class="product-card">
          <header class="product-card-header">
            <?php if ( has_post_thumbnail() ) : ?>
              <figure class="product-card-thumbnail">
                <?php the_post_thumbnail('full'); ?>
              </figure>
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
      </li>
    <?php //endif;
  }

  add_action( 'maqfort_products_onfront', 'maqfort_products_onfront_loop' );

}

/*
 * -----------------------------------------------------------
 * 3.0 Search loop.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_search_results_loop' ) ) {

  function maqfort_search_results_loop() { ?>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
      <article class="card">
        <header class="card-header">
          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
              <figure class="card-thumbnail">
                <?php the_post_thumbnail(); ?>
                <span class="icon-rounded"><i class="fa fa-link" aria-hidden="true"></i></span>
              </figure>
            </a>
          <?php endif; ?>
        </header>
        <section class="card-content">
          <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
          <hr>
          <?php the_excerpt(); ?>
        </section>
      </article>
    </div>

  <?php }

add_action( 'maqfort_search_results_loop', 'maqfort_search_loop' );

}
