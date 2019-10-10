        </main>
        <footer id="main-footer" role="footer-wrapper" itemscope itemtype="http://schema.org/WPFooter">
          <section class="footer-widgets">
            <div class="container container-fluid">
              <div class="row" >
                <?php get_sidebar( 'footer' ); ?>
              </div>
            </div>
            <section class="bottom-widgets">
              <div class="container container-fluid">
                <div class="row center-xs between-md between-lg middle-sm middle-md middle-lg">
                  <?php get_sidebar( 'footer-small' ); ?>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <?php do_action('mf_social'); ?>
                  </div>
                </div>
              </div>
          </section>
          <section class="copyright">
            <div class="container container-fluid">
              <div class="row">
                <div class="col-12  col-xs-12 col-sm-6 col-md-6">
                  <p><?php bloginfo( 'name' ); ?> &copy; <?php echo date( 'Y' ); ?> <?php _e( ' - Todos os Direitos Reservados', 'maqfort' ); ?></p>
                </div>
                <div class="col-12 col-xs-12 col-sm-6 col-md-6">
                  <p class="dev-by"><?php _e('Desenvolvido por:', 'maqfort'); ?> <a href="https://crew.pt" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/crew-rgb-white.svg" alt="crew"></a></p>
                </div>
              </div>
            </div>
          </section>
        </footer>
        <a href="javascript:" id="return-to-top" rel="nofollow"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        <?php wp_footer(); ?>
      </div><!-- site-container ends -->
    </div><!-- site-wrapper ends -->
  </body>
</html>
