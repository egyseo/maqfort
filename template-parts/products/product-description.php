<?php
/**
 * -----------------------------------------------------------
 * Thew product full description.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>
<section class="product-info">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
				the_content();

				$has_laser     = get_post_meta( get_the_ID(), '_mf_produtos_laser', 1 );
				$is_industry40 = get_post_meta( get_the_ID(), '_mf_produtos_industry', 1 );

				if ( $has_laser ) :
					get_template_part( 'template-parts/products/product', 'block-laser' );
				endif;

				if ( $is_industry40 ) :
					get_template_part( 'template-parts/products/product', 'block-industry' );
				endif;
				?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .product-info -->
