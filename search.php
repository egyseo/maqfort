<?php get_header(); ?>

<section class="search-page">
  <?php if ( have_posts() ) : ?>
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2>
            <?php echo esc_html_e( 'Resultados de pesquisa para', 'maqfort' ) ?>:  <span class=""><?php the_search_query(); ?></span>
          </h2>
        </div>
      </div>
      <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php do_action( 'maqfort_search_loop' ); ?>
        <?php endwhile; // End of the loop
        else:
          get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>
        </div><!-- row ends -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <?php maqfort_pagination(); ?>
          </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
