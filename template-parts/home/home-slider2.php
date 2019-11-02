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
								<h2 class="hero-title">MAQFORT</h2>
								<p class="hero-subtitle">12 000 m2 de área de exposição.</p>
								<p class="hero-description">MAQFORT distribui e dá assistência técnica.</p>
								<a href="#" class="hero-link" >Saber mais</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
