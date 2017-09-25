<?php

// News on home pages
if ( ! function_exists( 'maqfort_news_card_loop' ) ) {

  function maqfort_news_card_loop() { ?>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
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

// Products on home page
if ( ! function_exists( 'maqfort_products_onfront_loop' ) ) {

  function maqfort_products_onfront_loop() { ?>

    <?php //if( get_post_meta( get_the_ID(), '_amobft_checkbox', 1 ) ): ?>
      <li>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="product-card-link">
          <article class="product-card">
            <?php if ( has_post_thumbnail() ) : ?>
              <figure class="product-card-thumbnail">
                <?php the_post_thumbnail('full'); ?>
                <figcaption>
                  <h2 class="product-card-title"><span><?php the_title(); ?></span></h2>
                </figcaption>
              </figure>
            <?php endif; ?>
          </article><!-- article ends -->
        </a>
      </li>
    <?php //endif;
  }

  add_action( 'maqfort_products_onfront', 'maqfort_products_onfront_loop' );

}
