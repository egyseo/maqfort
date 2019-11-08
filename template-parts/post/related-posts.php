<?php
/**
 * -----------------------------------------------------------
 * Related Posts Section.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$original_post = $post;

global $post;

$categories = get_the_category( $post->ID );

if ( $categories ) :

	$category_ids = array();

	foreach ( $categories as $individual_category ) :
		$category_ids[] = $individual_category->term_id;
	endforeach;

	$args = array(
		'category__in'   => $category_ids,
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => 3,
	);

	$related_posts = new wp_query( $args );

	if ( $related_posts->have_posts() ) :

		echo '<section class="related-posts"><div class="container container-fluid"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2 class="section-title"><span>' . esc_html__( 'Notícias Relacionadas', 'maqfort' ) . '</span></h2></div></div><div class="row">';
		while ( $related_posts->have_posts() ) :
			$related_posts->the_post();
			do_action( 'mf_card_loop' );
		endwhile;
		echo '</div></div></section>';

	endif;

endif;

wp_reset_postdata();
