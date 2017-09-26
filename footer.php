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
                <div class="row" >
                  <?php get_sidebar( 'bottomfooter' ); ?>
                </div>
              </div>
          </section>
          <section class="copyright">
            <div class="container container-fluid">
              <div class="row middle-xs between-xs">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> <?php _e( 'All Rights Reserved.', 'maqfort' ); ?></p>
                </div>
              </div>
            </div>
          </section>
        </footer>
        <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        <?php wp_footer(); ?>
      </div><!-- site-container ends -->
    </div><!-- site-wrapper ends -->
  </body>
</html>
