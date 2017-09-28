<?php

$original_post = $post;

global $post;

$categories = get_the_category($post->ID);

if ($categories) {

  $category_ids = array();

  foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

  $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 2, // Number of related posts that will be shown.
  );

  $related_posts = new wp_query( $args );

  if( $related_posts->have_posts() ) {

    echo '<section class="related-posts"><div class="container container-fluid"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2 class="section-title"><span>' . __( 'Related Posts', 'maqfort' ) . '</span></h2></div></div><div class="row">';

    while( $related_posts->have_posts() ) {
      $related_posts->the_post();
      do_action( 'maqfort_card_loop' );
    }
    echo '</div></div></section>';
  }
}
$post = $original_post;
wp_reset_query();
