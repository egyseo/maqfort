<?php
/**
 * -----------------------------------------------------------
 * Block comment
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_full_description = get_post_meta( get_the_ID(), '_mf_produtos_wysiwyg', true );
?>
<section class="product-info">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php echo wpautop( $product_full_description ); ?>
			</div>
		</div>
	</div><!-- .row -->
</section><!-- .product-info -->
