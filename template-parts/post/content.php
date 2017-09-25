<article id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
	<header class="article-header">
    <div class="container container-fluid">
      <div class="row middle-xs middle-sm middle-md middle-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php
          if ( is_singular() ) :
            the_title( '<h1 class="article-title">', '</h1>' );
          else :
            the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;

          if ( 'post' === get_post_type() ) : ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
            <p class="article-date"><?php the_date(); ?></p>
        </div>
      </div>
    </div>


		<?php
		endif; ?>
	</header>

	<section class="article-content">
    <div class="container container-fluid">
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
	</section><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //maqfort_entry_footer(); ?>
	</footer>
</article>
