<div id="site-branding" class="col-xs-8 col-sm-8 col-md-2 col-lg-2 site-branding">
  <h1 class="hide-text"><?php bloginfo( 'name' ); ?></h1>
  <a href="<?php echo home_url(); ?>" class="logo">
    <?php get_template_part( 'template-parts/header/logo', 'svg' ); ?>
  </a>
</div>

<div id="navigation-toggle">
  <div class="col-xs-4 col-sm-4">
    <a href="#/" id="toggle-nav" class="toggle-nav" ><i class="fa fa-bars"></i></a>
  </div>
</div>
