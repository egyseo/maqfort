<div id="site-branding" class="col-xs-8 col-sm-3 col-md-3 col-lg-3 site-branding">
  <?php echo get_custom_logo(); ?>
  <div class="site-branding-text hide-text">
    <?php if ( is_front_page() ) : ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php else : ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php endif; ?>
    <?php
      $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) :
    ?>
      <p class="site-description"><?php echo $description; ?></p>
    <?php endif; ?>
  </div><!-- site-branding-text -->
</div>

<div id="navigation-toggle">
  <div class="col-xs-4">
    <a href="#/" id="toggle-nav" class="toggle-nav" ><i class="fa fa-bars"></i></a>
  </div>
</div>
