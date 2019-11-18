<?php
/**
 * -----------------------------------------------------------
 * The theme services section for the homepage.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$service_items              = get_post_meta( get_the_ID(), '_mf_homepage_itens', true );
$service_background_image   = get_theme_mod( 'mf_services_background_image' );
$service_background_overlay = get_theme_mod( 'mf_services_background_overlay' );

$service_background    = '';
$add_new_service_class = '';

if ( ! empty( $service_background_image && $service_background_overlay ) ) :
	$service_background    = 'style="background-image: linear-gradient( ' . esc_attr( $service_background_overlay ) . ', ' . esc_attr( $service_background_overlay ) . ' ), url(' . esc_url( $service_background_image ) . ');"';
	$add_new_service_class = 'class="background-image-with-overlay"';
endif;

if ( $service_items ) :
	$title_url = '#'
	?>
	<section id="home-services" <?php echo wp_kses_post( $add_new_service_class ) . wp_kses_post( $service_background ); ?> >
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-title-wrapper">
						<h2 class="section-title"><span><a href="<?php echo esc_url( $title_url ); ?>"><?php esc_html_e( 'Serviços', 'maqfort' ); ?></a></span></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				foreach ( (array) $service_items as $key => $service ) :

					$service_title = '';
					$service_url   = '';
					$service_image = '';
					$service_icon  = '';
					$service_desc  = '';

					if ( isset( $service['_mf_homepage_title'] ) ) :
						$service_title = esc_html( $service['_mf_homepage_title'] );
					endif;

					if ( isset( $service['_mf_homepage_description'] ) ) :
						$service_desc = esc_html( $service['_mf_homepage_description'] );
					endif;

					if ( isset( $service['_mf_homepage_url'] ) ) :
						$service_url = esc_html( $service['_mf_homepage_url'] );
					endif;

					if ( isset( $service['_mf_homepage_image'] ) ) :
						$service_image = wp_get_attachment_url( $service['_mf_homepage_image_id'] );
					endif;

					if ( isset( $service['_mf_homepage_icon'] ) ) :
						$service_icon = esc_html( $service['_mf_homepage_icon'] );
					endif;

					if ( ! empty( $service_url ) ) :
						?>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="service-box-wrapper">
								<a class="service-box" href="<?php echo esc_url( $service_url ); ?>">
									<div class="service-image-wrapper">
										<?php
										if ( $service_image ) :
											echo '<img class="service-image" src="' . esc_url( $service_image ) . '" alt="' . esc_attr( $service_title ) . '" />';
										else :
											echo '<img class="service-image" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder.png" alt="imagem provisória" />';
										endif;
										if ( $service_icon ) :
											echo '<i class="fa ' , esc_attr( $service_icon ) , '" aria-hidden="true"></i>';
										endif;
										?>
									</div><!-- .service-image-box -->
									<div class="service-content">
										<?php
										if ( $service_title ) :
											echo '<h3 class="service-title">' , esc_html( $service_title ) , '</h3>';
										endif;
										if ( $service_desc ) :
											echo '<p class="service-description">' , esc_html( $service_desc ) , '</p>';
										endif;
											echo '<div class="service-button"><p class="btn btn-secondary">' , esc_html__( 'Saber mais', 'maqfort' ) , '</p></div>';
										?>
									</div><!-- .service-content -->
								</a><!-- service-box -->
							</div><!-- service-box-wrapper -->
						</div><!-- .col -->
						<?php
					endif;
				endforeach;
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #home-services -->
	<?php
endif;
