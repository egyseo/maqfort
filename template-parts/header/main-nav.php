<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
  <?php if ( has_nav_menu( 'main-menu' ) ) { ?>
    <nav id="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <?php wp_nav_menu(array(
             'container' => false,                           // remove nav container
             'container_class' => 'main-menu-container',     // class of container (should you choose to use it)
             'menu' => __( 'Main Menu', 'maqfort' ),         // nav name
             'menu_class' => 'main-menu',                    // adding custom nav class
             'theme_location' => 'main-menu',                // where it's located in the theme
             'before' => '',                                 // before the menu
             'after' => '',                                  // after the menu
             'link_before' => '',                            // before each link
             'link_after' => '',                             // after each link
             'depth' => 0,                                   // limit the depth of the nav
             'fallback_cb' => ''                             // fallback function (if there is one)
      )); ?>
    </nav> <?php
  } else {
    ?> <p>Please assign some items to your main menu.</p> <?php
  } ?>
</div>
