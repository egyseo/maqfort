<?php
get_header(); ?>

<section class="error-404 not-found">
  <div class="container container-fluid">
    <div class="row center-md center-lg middle-md middle-lg">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <header class="404-header">
            <h1><?php esc_html_e( 'Oops! x(', 'maqfort' ); ?></h1>
          </header>
          <div class="404-content">
            <p><?php esc_html_e( 'Parece que não encontramos nada por aqui.', 'maqfort' ); ?></p>
            <?php get_search_form(); ?>
          </div>

      </div>
    </div>
  </div>
</section>

<?php get_footer();
