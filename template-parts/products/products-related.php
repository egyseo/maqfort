<?php
/**
 * -----------------------------------------------------------
 * Related Products Section.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

/* Snippet form : https://teamtreehouse.com/community/wordpress-related-posts-with-the-same-taxonomy-but-not-the-current-post */
$post_terms = wp_get_object_terms( $post->ID, 'mf_tipos_de_produtos', array( 'fields' => 'ids' ) );

$related_products_args = array(
	'post_type'      => 'mf_produtos',
	'posts_per_page' => 3,
	'post__not_in'   => array( $post->ID ),
	'tax_query'      => array(
		array(
			'taxonomy' => 'mf_tipos_de_produtos',
			'relation' => 'OR',
			'field'    => 'id',
			'terms'    => $post_terms,
		),
	),
);

$related_products = new WP_Query( $related_products_args );

if ( $related_products->have_posts() ) :
	?>
	<section class="related-products">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-title-wrapper">
						<h3 class="section-title"><span><?php esc_html_e( 'Produtos Relacionados', 'maqfort' ); ?></span></h3>
					</div><!-- .section-title-wrapper -->
				</div><!-- .col -->
			</div><!-- .row -->
			<div class="row">
				<?php
				while ( $related_products->have_posts() ) :
					$related_products->the_post();
					do_action( 'mf_loop' );
				endwhile;
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .related-products -->
	<?php
endif;

wp_reset_postdata();
