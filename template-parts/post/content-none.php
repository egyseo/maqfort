<div class="container container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <header>
        <h1><?php esc_html_e( 'Nothing Found!', 'maqfort' ); ?></h1>
      </header>
      <section>
        <?php
          if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( wp_kses( __( 'Ready to write your first post? <a href="%1$s">Start here</a>.', 'maqfort' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

          <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry,  but we cant find anything with your search terms. Please try again with new terms.', 'maqfort' ); ?></p>
            <?php
            get_search_form();

          else : ?>

            <p><?php esc_html_e( 'We cant find what you are looking for, prehaps search can help you.', 'maqfort' ); ?></p>
            <?php
            get_search_form();

          endif;
        ?>
      </section>
    </div>
  </div>
</div>
