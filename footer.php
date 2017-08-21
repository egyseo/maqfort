  </main>
  <footer id="main-footer" role="footer-wrapper" itemscope itemtype="http://schema.org/WPFooter">
    <section class="footer-widgets">
      <div class="container-fluid">
        <div class="row" >
          <?php get_sidebar( 'footer' ); ?>
        </div>
      </div>
    </section>
    <section class="copyright">
      <div class="container-fluid">
        <div class="row middle-xs between-xs">
          <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> <?php _e( 'Todos os Direitos Reservados.', 'maqfort' ); ?></p>
        </div>
      </div>
    </section>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>
