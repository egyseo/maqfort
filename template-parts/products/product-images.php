<?php
/*
 * -----------------------------------------------------------
 * Images for product.
 * -----------------------------------------------------------
 */
$featuredImages = get_post_meta( get_the_ID(), '_mf_produtos_gallerie', true );
$carouselSlide  = get_post_meta( get_the_ID(), '_mf_produtos_carousel', true );

?>
<section class="slider-wrapper">
  <div id="product-featured-imgs" class="flexslider">
	<ul class="slides">
		<?php
		if ( $featuredImages ) :
			foreach ( $featuredImages as $imageId => $image ) :
				$imageOutput  = '';
				$imageFull    = wp_get_attachment_image( $imageId, 'full' );
				$imageAlt     = get_post_meta( $imageId, '_wp_attachment_image_alt', true );
				$imageUrl     = wp_get_attachment_url( $imageId );
				$imageOutput .= '<li><a href="' . esc_url( $imageUrl ) . '" data-fancybox="group"  data-caption="' . esc_attr( $imageAlt ) . '" >';
				$imageOutput .= $imageFull;
				$imageOutput .= '</a></li>';
				echo $imageOutput;
		  endforeach;
		endif;
		?>
	</ul>
  </div>
  <div id="product-carousel-galerie" class="flexslider">
	<ul class="slides">
		<?php
		if ( $carouselSlide ) :
			foreach ( $carouselSlide as $slideId => $slide ) :
				$slideOutput  = '';
				$slideFull    = wp_get_attachment_image( $slideId, 'full' );
				$slideAlt     = get_post_meta( $slideId, '_wp_attachment_image_alt', true );
				$slideUrl     = wp_get_attachment_url( $slideId );
				$slideOutput .= '<li><a href="' . $slideUrl . '" data-fancybox="group"  data-caption="' . $slideAlt . '" >';
				$slideOutput .= $slideFull;
				$slideOutput .= '</a></li>';
				echo $slideOutput;
		  endforeach;
		endif;
		?>
	</ul>
  </div>
</section>
