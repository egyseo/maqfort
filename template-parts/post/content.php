<article id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
	<header class="article-header" style="background-color:#525254;background-image:url(<?php the_post_thumbnail_url('maqfort-header'); ?>);background-position:center; background-repeat:no-repeat; background-size:cover;">
    <div class="container container-fluid">
      <div class="row bottom-xs bottom-sm bottom-md bottom-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="article-header-box-top">
            <?php the_title( '<h1 class="article-title">', '</h1>' ); ?>
          </div>
        </div>
      </div>
    </div>
	</header>
	<section class="article-content">
    <div class="container container-fluid">
      <div class="row top-xs top-sm top-md top-lg">
        <div class="col-xs-12">
          <div class="article-header-box-bottom">
            <div class="article-date">
              <span class="day"><?php the_time('d'); ?></span>
              <span class="month-year">
                <span class="month"><?php the_time('M'); ?></span>
                <span class="year"><?php the_time('Y'); ?></span>
              </span>
            </div>
            <?php do_action( 'maqfort_postmeta' ); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php
            the_content( sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'maqfort' ),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              get_the_title()
            ) );

            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maqfort' ),
              'after'  => '</div>',
            ) );
          ?>
        </div>
      </div>
    </div>
	</section>
</article>
