<?php
/**
 * -----------------------------------------------------------
 * The theme mobile navigation menu.
 * -----------------------------------------------------------
 */
?>
<div id="mobile-navigation">
	<?php
	if ( has_nav_menu( 'mobile-menu' ) ) :
		?>
		<nav id="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu(
				array(
					'menu_id'         => 'menu-toggle',
					'container'       => false,
					'container_class' => 'mobile-menu-container',
					'menu'            => __( 'Mobile Menu', 'maqfort' ),
					'menu_class'      => 'mobile-menu',
					'theme_location'  => 'mobile-menu',
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
		<div class="menu-offcanvas-extras">
			<?php get_search_form(); ?>
			<div class="off-canvas-social">
				<?php mf_social_icons(); ?>
			</div>
		</div>
		<?php
	else :
		echo '<p class="no-nav">' , esc_html__( 'Adicione alguns itens ao menu principal.', 'maqfort' ) , '</p>';
	endif;
	?>
</div>
