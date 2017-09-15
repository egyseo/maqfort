<div id="site-branding" class="col-xs-6 col-sm-6 col-md-2 col-lg-2 site-branding">
  <a href="<?php echo home_url(); ?>" class="logo">
    <h1 class="hide-text"><?php bloginfo( 'name' ); ?></h1>

    <?php get_template_part( 'template-parts/header/logo', 'svg' ); ?>
  </a>
</div>

<div id="navigation-toggle">
  <div class="col-xs-6 col-sm-6">
    <a href="#/" id="toggle-nav" class="toggle-nav" ><i class="fa fa-bars"></i></a>
  </div>
</div>
