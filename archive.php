<?php

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
          <?php if(is_tax()) : ?>
            <?php echo term_description(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
  <?php if ( have_posts() ) : ?>
  <section class="page-content">
    <div class="container container-fluid">
      <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php do_action( 'mf_loop' ); ?>
        <?php endwhile; // End of the loop
        else:
          get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>
      </div><!-- row ends -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <?php mf_pagination(); ?>
        </div>
      </div>
    </div>
  </section>
</article>

<?php get_footer();
