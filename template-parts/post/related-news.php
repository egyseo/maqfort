<?php
/**
 * -----------------------------------------------------------
 * Related News Section.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

global $post;

$related_news = get_post_meta( get_the_ID(), '_mf_related_posts_search_news', true );

if ( $related_news ) :
	?>
	<section class="related-news">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="section-title"><span><?php esc_html_e( 'Notícias Relacionadas', 'maqfort' ); ?></span></h1>
				</div><!-- .col -->
			</div><!-- .row -->
			<div class="row">
				<?php
				foreach ( $related_news as $news ) :
					do_action( 'mf_card_loop' );
				endforeach;
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .related-news -->
	<?php

endif;

wp_reset_postdata();
