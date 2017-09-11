<div id="mobile-navigation">
  <a href="#/" id="close-navigation" class="toggle-nav"><i class="fa fa-times"></i></a>
  <?php if ( has_nav_menu( 'mobile-menu' ) ) { ?>
    <nav id="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <?php wp_nav_menu(array(
              'menu_id' => 'menu-toggle',
             'container' => false,                           // remove nav container
             'container_class' => 'mobile-menu-container',     // class of container (should you choose to use it)
             'menu' => __( 'Mobile Menu', 'maqfort' ),         // nav name
             'menu_class' => 'mobile-menu',                    // adding custom nav class
             'theme_location' => 'mobile-menu',                // where it's located in the theme
             'before' => '',                                 // before the menu
             'after' => '',                                  // after the menu
             'link_before' => '',                            // before each link
             'link_after' => '',                             // after each link
             'depth' => 0,                                   // limit the depth of the nav
             'fallback_cb' => ''                             // fallback function (if there is one)
      )); ?>
    </nav>
    <div class="menu-offcanvas-extras">
      <?php get_search_form(); ?>
      <div class="off-canvas-social">
        <?php maqfort_social_icons(); ?>
      </div>
    </div>
    <?php
    } else {
    ?> <p>Please assign some items to your main menu.</p> <?php
  } ?>
</div>
