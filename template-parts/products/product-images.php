<?php
/**
 * -----------------------------------------------------------
 * Images gallery for product.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$featured_images = get_post_meta( get_the_ID(), '_mf_produtos_gallerie', true );
$carousel_slides = get_post_meta( get_the_ID(), '_mf_produtos_carousel', true );

?>
<section class="slider-wrapper">
	<div id="product-featured-imgs" class="flexslider">
		<ul class="slides">
			<?php
			if ( $featured_images ) :
				foreach ( $featured_images as $image_id => $image ) :
					$image_output  = '';
					$image_full    = wp_get_attachment_image( $image_id, 'full' );
					$image_alt     = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
					$image_url     = wp_get_attachment_url( $image_id );
					$image_output .= '<li><a href="' . esc_url( $image_url ) . '" data-fancybox="group"  data-caption="' . esc_attr( $image_alt ) . '" >';
					$image_output .= $image_full;
					$image_output .= '</a></li>';
					echo wp_kses_post( $image_output );
				endforeach;
			endif;
			?>
		</ul><!-- .slides -->
	</div><!-- #product-featured-imgs .flexslider -->
	<div id="product-carousel-galerie" class="flexslider">
		<ul class="slides">
			<?php
			if ( $carousel_slides ) :
				foreach ( $carousel_slides as $slide_id => $slide ) :
					$slide_output  = '';
					$slide_full    = wp_get_attachment_image( $slide_id, 'full' );
					$slide_alt     = get_post_meta( $slide_id, '_wp_attachment_image_alt', true );
					$slide_url     = wp_get_attachment_url( $slide_id );
					$slide_output .= '<li><a href="' . $slide_url . '" data-fancybox="group"  data-caption="' . $slide_alt . '" >';
					$slide_output .= $slide_full;
					$slide_output .= '</a></li>';
					echo wp_kses_post( $slide_output );
				endforeach;
			endif;
			?>
		</ul><!-- .slides -->
	</div><!-- #product-carousel-galerie .flexslider -->
</section><!-- .slider-wrapper -->
