<article class="product-article" id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
  <header class="product-header">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        </div>
      </div>
    </div>
  </header>

  <section class="product-content">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <?php if ( has_post_thumbnail() ) { ?>
            <figure class="product-featured-img">
              <?php the_post_thumbnail('full'); ?>
            </figure>
          <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <?php the_title( '<h1 class="article-title">', '</h1>' ); ?>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
  <footer class="product-footer">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        </div>
      </div>
    </div>
  </footer>
</article>
