
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </div>
      </div>
    </div>
  </header>
  <section class="page-content">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <?php
            the_content();

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