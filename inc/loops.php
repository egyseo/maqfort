<?php

/*
 * -----------------------------------------------------------
 * 1.0 Home page news loop.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_news_card_loop' ) ) {

  function mf_news_card_loop() { ?>

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

  add_action( 'mf_card_loop', 'mf_news_card_loop' );

}

/*
 * -----------------------------------------------------------
 * 2.0 Standart loop.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_standart_loop' ) ) {

  function mf_standart_loop() { ?>

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
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <figure class="post-card-thumbnail">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/placeholder.png" alt="imagem provisória">
              </figure>
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

add_action( 'mf_loop', 'mf_standart_loop' );

}
