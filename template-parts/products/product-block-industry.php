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
	<div class="section-title-wrapper">
		<h4 class="section-title"><span><?php esc_html_e( 'Indústria 4.0', 'maqfort' ); ?></span></h4>
	</div>
	<div class="industry-block-content">
		<div class="block-description">
			<?php echo wp_kses_post( wpautop( $product_block_industry_description ) ); ?>
		</div>
	</div>
</section><!-- #industry-block ->
