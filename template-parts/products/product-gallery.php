<?php
/**
 * -----------------------------------------------------------
 * Images gallery for product.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_featured_image     = get_the_post_thumbnail( get_the_ID(), 'full' );
$product_carousel_images    = get_post_meta( get_the_ID(), '_mf_produtos_carousel', 1 );
$product_featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$product_featured_image_alt = get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true );

function console_log( $data ) {
	echo '<script>';
	echo 'console.log(' . wp_json_encode( $data ) . ')';
	echo '</script>';
}

?>

<section id="product-gallery-wrapper">
	<div class="swiper-container gallery-frame">
		<div class="swiper-wrapper">
			<?php
			if ( $product_carousel_image ) :
				echo '<div class="swiper-slide"><a href="' , esc_url( $product_featured_image_url ) , '" data-fancybox="gallery" data-caption="' . esc_html( $product_featured_image_alt ) . '">' . wp_kses_post( $product_featured_image ) . '</a></div>';
				foreach ( (array) $product_carousel_images as $carousel_id => $image ) :
					$image_full    = wp_get_attachment_image( $carousel_id, 'full' );
					$image_alt     = get_post_meta( $carousel_id, '_wp_attachment_image_alt', true );
					$image_url     = wp_get_attachment_url( $carousel_id );
					$image_output  = '';
					$image_output .= '<div class="swiper-slide"><a href="' . esc_url( $image_url ) . '" data-fancybox="gallery" data-caption="' . esc_html( $image_alt ) . '">' . $image_full . '</a></div>';
					echo wp_kses_post( $image_output );
				endforeach;
			endif;
			?>
		</div><!-- .swiper-wrapper -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div><!-- .gallery-frame-->
	<div class="swiper-container gallery-thumbs">
		<div class="swiper-wrapper">
			<?php
			if ( $product_carousel_images ) :
				echo '<div class="swiper-slide">' . wp_kses_post( $product_featured_image ) . '</div>';
				foreach ( (array) $product_carousel_images as $carousel_id => $image ) :
					$image_full    = wp_get_attachment_image( $carousel_id, 'full' );
					$image_output  = '';
					$image_output .= '<div class="swiper-slide">' . $image_full . '</div>';
					echo wp_kses_post( $image_output );
				endforeach;
			endif;
			?>
		</div><!-- .swiper-wrapper -->
	</div><!-- .gallery-thumbs -->
</section><!-- #product-gallery-wrapper -->
