<?php
/**
 * -----------------------------------------------------------
 * Images gallery for product.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_featured_image  = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$product_carousel_images = get_post_meta( get_the_ID(), '_mf_produtos_carousel', true );

array_unshift( $product_carousel_images, $product_featured_image );

function console_log( $data ) {
	echo '<script>';
	echo 'console.log(' . wp_json_encode( $data ) . ')';
	echo '</script>';
}

?>

<section id="product-gallery-wrapper">
	<!-- Swiper -->
	<div class="swiper-container gallery-frame">
		<div class="swiper-wrapper">
			<?php
			if ( $product_carousel_images ) :
				foreach ( (array) $product_carousel_images as $carousel_id => $image ) :
					$image_output = '';
					console_log( $image );
					$image_output .= '<div class="swiper-slide" style="background-image:url(' . esc_url( $image ) . ')"></div>';
					echo wp_kses_post( $image_output );
				endforeach;
			endif;
			?>
		</div><!-- .swiper-wrapper -->
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div><!-- .gallery-frame-->
	<div class="swiper-container gallery-thumbs">
		<div class="swiper-wrapper">
			<?php
			if ( $product_carousel_images ) :
				foreach ( (array) $product_carousel_images as $carousel_id => $image ) :
					$image_output  = '';
					$image_output .= '<div class="swiper-slide" style="background-image:url(' . esc_url( $image ) . ')"></div>';
					echo wp_kses_post( $image_output );
				endforeach;
			endif;
			?>
		</div><!-- .swiper-wrapper -->
	</div><!-- .gallery-thumbs -->
</section>
