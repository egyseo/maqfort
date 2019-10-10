<?php
get_header(); ?>

<section class="error-not-found">
  <div class="container container-fluid">
    <div class="row center-md center-lg middle-md middle-lg">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <header>
            <h1><?php _e( 'Oops! x(', 'maqfort' ); ?></h1>
          </header>
          <section>
            <p><?php _e( 'Parece que não encontramos nada por aqui.', 'maqfort' ); ?></p>
            <?php get_search_form(); ?>
            <a class="go-to-home" href="<?php echo get_home_url(); ?>"><?php _e('Ir para o início', 'maqfort'); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </section>

      </div>
    </div>
  </div>
</section>

<?php get_footer();
