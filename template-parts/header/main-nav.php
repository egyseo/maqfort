<?php
/**
 * -----------------------------------------------------------
 * The theme main navigation menu.
 * -----------------------------------------------------------
 */
?>
<div id="site-main-navigation" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
	<?php
	if ( has_nav_menu( 'main-menu' ) ) :
		?>
		<nav id="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu(
				array(
					'container'       => false,
					'container_class' => 'main-menu-container',
					'menu'            => __( 'Main Menu', 'maqfort' ),
					'menu_class'      => 'main-menu',
					'theme_location'  => 'main-menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'depth'           => 0,
					'fallback_cb'     => '',
				)
			);
			?>
		</nav>
		<?php
	else :
		echo '<p class="no-nav">', esc_html__( 'Adicione alguns itens ao menu principal', 'maqfort' ) , '</p>';
	endif;
	?>
</div>
