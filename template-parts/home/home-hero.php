<?php
/**
 * -----------------------------------------------------------
 * Custom home hero for the theme.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$hero_title               = get_theme_mod( 'mf_hero_title' );
$hero_subtitle            = get_theme_mod( 'mf_hero_subtitle' );
$hero_description         = get_theme_mod( 'mf_hero_description' );
$hero_link_text           = get_theme_mod( 'mf_hero_link_text' );
$hero_link_url            = get_theme_mod( 'mf_hero_link_url' );
$hero_link_text_secondary = get_theme_mod( 'mf_hero_link_text_2' );
$hero_link_url_secondary  = get_theme_mod( 'mf_hero_link_url_2' );
$hero_video_poster        = get_theme_mod( 'mf_hero_video_poster' );
$hero_video_mp4           = get_theme_mod( 'mf_hero_video_mp4' );
$hero_video_webm          = get_theme_mod( 'mf_hero_video_webm' );
$hero_video_ogv           = get_theme_mod( 'mf_hero_video_ogv' );
$hero_video_filter        = get_theme_mod( 'mf_hero_video_filter' );


if ( ! empty( $hero_title ) ) :
	?>
	<section id="home-hero-wrapper">
		<div class="video-background-wrapper">
			<?php if ( ! empty( $hero_video_mp4 || $hero_video_webm || $hero_video_ogv ) ) : ?>
			<video id="video-background" poster="<?php echo esc_url( $hero_video_poster ); ?>" autoplay muted loop>
				<source src="<?php echo esc_url( $hero_video_mp4 ); ?>" type="video/mp4">
				<source src="<?php echo esc_url( $hero_video_webm ); ?>" type="video/webm">
				<source src="<?php echo esc_url( $hero_video_ogv ); ?>" type="video/ogv">
			</video> <!-- #video-background -->
		<?php endif; ?>
			<div class="hero-content-container" style="background-color: <?php echo esc_attr( $hero_video_filter ); ?>">
				<div class="container container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
							<div class="hero-content">
								<div class="content-wrapper">
									<?php
									if ( ! empty( $hero_title ) ) :
										?>
										<p class="hero-title"><?php echo wp_kses_post( $hero_title ); ?></p>
										<?php
									endif;
									if ( ! empty( $hero_description ) ) :
										?>
										<p class="hero-description"><?php echo esc_html( $hero_description ); ?></p>
										<?php
									endif;
									if ( ! empty( $hero_link_text ) ) :
										?>
										<a href="<?php echo esc_url( $hero_link_url ); ?>" class="btn btn-primary" ><?php echo esc_html( $hero_link_text ); ?></a>
										<?php
									endif;
									if ( ! empty( $hero_link_text_secondary ) ) :
										?>
										<a href="<?php echo esc_url( $hero_link_url_secondary ); ?>" class="btn btn-secondary" ><?php echo esc_html( $hero_link_text_secondary ); ?></a>
										<?php
									endif;
									?>
									<div class="icon-scroll-down">
										<div class="mouse">
											<div class="mouse-scroll"></div>
										</div><!-- .mouse -->
									</div><!-- .icon-scroll-down-->
								</div><!--- .content-wrapper -->
							</div><!-- .hero-content -->
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #hero-content-container -->
		</div><!-- .video-background-wrapper -->
	</section><!-- #home-hero-wrapper -->
	<?php
endif;
