<?php

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="page-content">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
        </div>
      </div>
    </div>
        <?php if ( have_posts() ) : ?>
        <section class="page-content">
          <div class="container container-fluid">
            <div class="row">
              <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
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
                    </section>
                  </article>
                </div>

              <?php endwhile; // End of the loop
              else:
                get_template_part( 'template-parts/post/content', 'none' );
              endif; ?>
            </div><!-- row ends -->

      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <?php mf_pagination(); ?>
        </div>
      </div>
  </section>
</article>

<?php get_footer();
