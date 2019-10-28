<?php
/**
 * -----------------------------------------------------------
 * The theme default sidebar.
 * -----------------------------------------------------------
 */

if ( ! is_active_sidebar( 'sidebar' ) ) :

	return;

endif;

?>

<aside id="secondary" class="widget-sidebar col-xs-12 col-md-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>
