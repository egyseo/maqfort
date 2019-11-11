<?php
/**
 * -----------------------------------------------------------
 * Theme theme loops.
 *
 * @package maqfort
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_news_card_loop' ) ) :

	function mf_news_card_loop() {
		?>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<article class="post-card">
				<header class="post-card-header">
					<?php
					if ( has_post_thumbnail() ) :
						?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<figure class="post-card-thumbnail">
								<?php the_post_thumbnail( 'maqfort-thumbnail' ); ?>
							</figure><!-- .post-card-thumbnail -->
							<div class="post-card-date">
								<span class="day"><?php the_time( 'd' ); ?></span>
								<span class="month"><?php the_time( 'M' ); ?></span>
							</div><!-- .post-card-date -->
						</a>
						<?php
					endif;
					?>
				</header><!-- .post-card-header -->
				<section class="post-card-content">
					<h3 class="post-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</section><!-- .post-card-content -->
				<footer class="post-card-footer">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				</footer><!-- .post-card-footer -->
			</article><!-- .post-card -->
		</div><!-- .col -->
		<?php
	}

	add_action( 'mf_card_loop', 'mf_news_card_loop' );

endif;

/*
 * -----------------------------------------------------------
 * 2.0 Standart loop.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_standart_loop' ) ) :

	function mf_standart_loop() {
		$is_industry40    = get_post_meta( get_the_ID(), '_mf_produtos_industry', 1 );
		$is_hyperhterm    = get_post_meta( get_the_ID(), '_mf_produtos_hypertherm', 1 );
		$hypertherm_image = get_theme_mod( 'mf_products_hypherterm' );
		?>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<article class="post-card">
				<header class="post-card-header">
					<?php
					if ( has_post_thumbnail() ) :
						?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<figure class="post-card-thumbnail">
								<?php the_post_thumbnail( 'maqfort-thumbnail' ); ?>
							</figure><!-- .post-card-thumbnail -->
						</a>
						<?php
					endif;
					if ( $is_industry40 ) :
						echo '<div class="is-industry40"><p>' , esc_html( __( 'Indústria 4.0', 'maqfort' ) ) , '</p></div>';
					endif;
					if ( $is_hyperhterm && $hypertherm_image ) :
						echo '<div class="is-hypertherm"><img src="' , esc_url( $hypertherm_image ) , '" alt="hyperterm Highperformance Plasma" /></div>';
					endif;
					?>
				</header><!-- .post-card-header -->
				<section class="post-card-content">
					<h3 class="post-card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</section><!-- .post-card-content -->
				<footer class="post-card-footer">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				</footer><!-- .post-card-footer -->
			</article><!-- .post-card-header -->
		</div><!-- .col -->

		<?php
	}

	add_action( 'mf_loop', 'mf_standart_loop' );

endif;
