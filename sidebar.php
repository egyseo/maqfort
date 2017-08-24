<?php

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
  return;
}
?>

<aside id="secondary" class="widget-sidebar col-xs-12 col-md-3" role="complementary">
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
