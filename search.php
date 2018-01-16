<?php get_header(); ?>

<article id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
  <?php if ( have_posts() ) : ?>
  <header class="search-header">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1 class="page-title">
            <?php echo esc_html_e( 'Search results for', 'maqfort' ) ?>: <span><?php the_search_query(); ?></span>
          </h1>
        </div>
      </div>
    </div>
  </header>
  <section class="search-page">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <?php
            while ( have_posts() ) : the_post();

              do_action( 'maqfort_loop' );

            endwhile;

            else:

              get_template_part( 'template-parts/post/content', 'none' );

            endif;
          ?>
          
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <?php maqfort_pagination(); ?>
        </div>
      </div>
    </div>
  </section>
</article>

<?php get_footer(); ?>
