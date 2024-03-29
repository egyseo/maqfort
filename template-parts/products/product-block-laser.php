<?php
/**
 * -----------------------------------------------------------
 * Block section to show if product has laser.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_block_laser_image       = get_theme_mod( 'mf_product_block_laser_image' );
$product_block_laser_description = get_theme_mod( 'mf_product_block_laser' );

?>

<section id="laser-block" class="product-block">
		<div class="section-title-wrapper">
			<h4 class="section-title"><span><?php esc_html_e( 'Os lasers NUKON', 'maqfort' ); ?></span></h4>
		</div>
	<div class="laser-block-content">
		<img src="<?php echo esc_url( $product_block_laser_image ); ?>" alt="laser-nukon" />
		<div class="block-description">
			<?php echo wp_kses_post( wpautop( $product_block_laser_description ) ); ?>
		</div>
	</div><!-- .laser-block-content -->
</section><!-- #laser-block -->
