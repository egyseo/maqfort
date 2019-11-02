<?php
/**
 * -----------------------------------------------------------
 * The theme products slider section for the homepage.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$products_terms = get_terms(
	array(
		'taxonomy'   => 'mf_tipos_de_produtos',
		'hide_empty' => true,
		'parent'     => 0,
		'orderby'    => 'menu_order',
		'order'      => 'ASC',
	)
);

$products_archives_url = get_post_type_archive_link( 'mf_produtos' );

if ( $products_terms ) :
	?>
	<section id="home-products-slider">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-title-wrapper">
						<h2 class="section-title"><span><a href="<?php echo esc_url( $products_archives_url ); ?>"><?php esc_html_e( 'Produtos', 'maqfort' ); ?></a></span></h2>
						<a class="see-all" href="<?php echo esc_url( $products_archives_url ); ?>"><?php esc_html_e( 'Ver todos produtos', 'maqfort' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div><!-- .section-title-wrapper -->
				</div><!-- .col -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php
							foreach ( $products_terms as $product_term ) :

								if ( 0 === $product_term->parent ) :

									if ( get_term_meta( $product_term->term_id, 'customtaxonomie_mb_showon_home', 1 ) ) :

										$term_link  = get_term_link( $product_term );
										$term_image = wp_get_attachment_image( get_term_meta( $product_term->term_id, 'customtaxonomie_mb_image_id', 1 ), 'full' );
										$output     = '<div class="swiper-slide"><article class="product-card"><header class="produc-card-header">';
										if ( ! empty( $term_image ) ) :
											$output .= '<a href="' . esc_url( $term_link ) . '"><figure class="product-card-thumbnail">' . $term_image . '</figure></a>';
										else :
											$output .= '<a href="' . esc_url( $term_link ) . '"><figure class="product-card-thumbnail"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="imagem provisória"></figure></a>';
										endif;
										$output .= '</header>';
										$output .= '<div class="product-card-content"><a href="' . esc_url( $term_link ) . '"><h2 class="product-card-title">' . esc_attr( $product_term->name ) . '</h2></a>';
										$output .= '<p class="card-desc">' . mf_truncate( esc_html( $product_term->description ), 88 ) . '</p></div>';
										$output .= '<footer class="product-card-footer"><a href="' . esc_url( $term_link ) . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></footer></article></div><!-- .swiper-slide -->';

										echo wp_kses_post( $output );

									endif;

								endif;

							endforeach;
							?>
						</div><!-- .swiper-wrapper -->
						<div class="swiper-pagination"></div>
					</div><!-- .swiper-container -->
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #home-products-slider -->
	<?php
endif;

?>
<script>
	var mySwiper = new Swiper ('.swiper-container', {
		// Optional parameters
		autoHeight: true,
		slidesPerView: 1,
		slidesPerGroup: 3,
		spaceBetween: 10,
		loop: true,
		loopFillGroupWithBlank: true,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
				spaceBetween: 10,
			},
			// when window width is >= 480px
			480: {
				slidesPerView: 2,
				spaceBetween: 10,
			},
			// when window width is >= 640px
			640: {
				slidesPerView: 3,
				spaceBetween: 10,
			}
		},
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	})
</script>
