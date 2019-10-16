<article id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
	<header class="article-header">
    <div class="container container-fluid">
      <div class="row bottom-xs bottom-sm bottom-md bottom-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="article-header-box-top">
            <div class="article-date">
              <span class="day"><?php the_time('d'); ?></span>
              <span class="month-year">
                <span class="month"><?php the_time('M'); ?></span>
                <span class="year"><?php the_time('Y'); ?></span>
              </span>
            </div>
            <?php the_title( '<h1 class="article-title" rel="bookmark" itemprop="headline">', '</h1>' ); ?>
          </div>
        </div>
      </div>
    </div>
	</header>

	<section class="article-content" itemprop="articleBody">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full'); ?>
            <hr>
          <?php endif; ?>
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
