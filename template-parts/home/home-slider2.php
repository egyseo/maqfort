<?php
/**
 * -----------------------------------------------------------
 * Custom home hero for the theme.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<section id="home-hero-wrapper">
	<div class="video-background-wrapper">
		<video id="video-background" poster="poster.JPG" autoplay muted loop>
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/videos/maqfort-video-website-banner.mp4' ); ?>" type="video/mp4">
		</video>
		<div class="hero-content-container">
			<div class="container container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="hero-content">
							<div class="content-wrapper">
								<h2 class="hero-title">Distribuimos Máquinas</h2>
								<p class="hero-subtitle">Temos uma área de exposição 12 000 m2</p>
								<p class="hero-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, vel.</p>
								<a href="#" class="hero-link" >Ver Produtos</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #hero-content-container -->
	</div><!-- .video-background-wrapper -->
</section><!-- #home-hero-wrapper -->
