<?php
/**
 * -----------------------------------------------------------
 * Video section to show product videos.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_videos = get_post_meta( get_the_ID(), '_mf_produtos_videos', true );

if ( $product_videos ) :
	?>
	<section class="product-video-gallerie">
		<div class="container container-fluid">
			<div class="row">
				<?php
				foreach ( (array) $product_videos as $video_id => $video ) :

					$video_url = '';

					if ( isset( $video['_mf_produtos_embed'] ) ) :
						$video_url = esc_url( $video['_mf_produtos_embed'] );
					endif;

					if ( $video_url ) :
						?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<?php
							echo wp_oembed_get( $video_url );
							?>
						</div><!-- .col -->
						<?php
					endif;

				endforeach;
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .product-video-gallerie -->
	<?php
endif;
