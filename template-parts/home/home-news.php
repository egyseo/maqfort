<?php
/**
 * -----------------------------------------------------------
 * The theme news setcion on the home page.
 * -----------------------------------------------------------
 */

// WP_Query arguments.
$blog_query_args = array(
	'post_type'           => array( 'post' ),
	'post_status'         => array( 'publish' ),
	'has_password'        => false,
	'order'               => 'DESC',
	'orderby'             => 'date',
	'posts_per_page'      => 3,
	'ignore_sticky_posts' => true,
);

// The Query.
$blog_query = new WP_Query( $blog_query_args );

if ( $blog_query->have_posts() ) :
	$title_url = get_permalink( get_option( 'page_for_posts' ) ); ?>

	<section id="home-news">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-title-wrapper">
						<h2 class="section-title"><span><a href="<?php echo esc_url( $title_url ); ?>"><?php esc_html_e( 'Notícias', 'maqfort' ); ?></a></span></h2>
						<a class="see-all" href="<?php echo esc_url( $title_url ); ?>"><?php esc_html_e( 'Ver todas as notícias', 'maqfort' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				while ( $blog_query->have_posts() ) :
					$blog_query->the_post();
					do_action( 'mf_card_loop' );
				endwhile;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
