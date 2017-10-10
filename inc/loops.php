<?php

/*
 * -----------------------------------------------------------
 * 1.0 Home page news loop.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'maqfort_news_card_loop' ) ) {

  function maqfort_news_card_loop() { ?>

  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <article class="post-card">
      <header class="post-card-header">
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <figure class="post-card-thumbnail">
              <?php the_post_thumbnail('maqfort-thumbnail'); ?>
            </figure>
            <div class="post-card-date">
              <span class="day"><?php the_time('d'); ?></span>
              <span class="month"><?php the_time('M'); ?></span>
            </div>
          </a>
        <?php endif; ?>
      </header>
      <section class="post-card-content">
        <h3 class="post-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
      </section>
      <footer class="post-card-footer">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
      </footer>
    </article><!-- article ends -->
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
    <?php //endif;
  }

  add_action( 'maqfort_products_onfront', 'maqfort_products_onfront_loop' );

}

/*
 * -----------------------------------------------------------
 * 3.0 Standart loop.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_standart_loop' ) ) {

  function maqfort_standart_loop() { ?>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
      <article class="post-card">
        <header class="post-card-header">
          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <figure class="post-card-thumbnail">
                <?php the_post_thumbnail('maqfort-thumbnail'); ?>
              </figure>
            </a>

          <?php else : ?>
            <figure class="post-card-thumbnail">
              <img src="https://via.placeholder.com/370x280" alt="">
            </figure>
          <?php endif; ?>
        </header>
        <section class="post-card-content">
          <h3 class="post-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
        </section>
        <footer class="post-card-footer">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </a>
        </footer>
      </article><!-- article ends -->
    </div>

  <?php }

add_action( 'maqfort_loop', 'maqfort_standart_loop' );

}


/*
 * -----------------------------------------------------------
 * 4.0 Related posts loop.
 * -----------------------------------------------------------
*/
