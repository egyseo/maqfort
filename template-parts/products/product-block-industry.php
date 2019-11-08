<?php
/**
 * -----------------------------------------------------------
 * Block section to show if product has Industry 4.0.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_block_industry_description = get_theme_mod( 'mf_product_block_industry' );

?>

<section id="industry-block" class="product-block">
	<h4 class="block-title"><?php esc_html_e( 'Indústria 4.0', 'maqfort' ); ?></h4>
	<div class="industry-block-content">
		<div class="block-description">
			<?php echo wp_kses_post( wpautop( $product_block_industry_description ) ); ?>
		</div>
	</div>
</section><!-- #industry-block ->
