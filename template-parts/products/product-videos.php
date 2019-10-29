<?php
/**
 * -----------------------------------------------------------
 * Video section to show product videos.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_videos = get_post_meta( get_the_ID(), '_mf_produtos_video_galerie', true );

if ( $product_videos ) :
	?>
	<section class="product-video-gallerie">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="section-title"><span><?php esc_html_e( 'Video Galerie', 'maqfort' ); ?></span></h1>
				</div>
			</div>
			<div class="row">
				<?php
				foreach ( (array) $product_videos as $video_id => $video ) :

					$video_url       = '';
					$video_thumbnail = '';

					if ( isset( $video['_mf_products_embed'] ) ) :
						$video_url = esc_url( $video['_mf_products_embed'] );
					endif;

					if ( isset( $video['_mf_products_image'] ) ) :
						$video_thumbnail = wp_get_attachment_url( $video['_mf_products_image_id'] );
					endif;

					if ( $video_url || $video_thumbnail ) :
						?>
						<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
							<a href="<?php echo esc_url( $video_url ); ?>" data-fancybox="video-group">
								<img src="<?php echo esc_url( $video_thumbnail ); ?>" alt="video-images">
							</a>
						</div>
						<?php
					endif;

				endforeach;
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .product-video-gallerie -->
	<?php
endif;
