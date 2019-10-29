<?php

global $post;

$related_posts = get_post_meta( get_the_ID(), '_mf_related_posts_search_news', true );

if ( $related_posts ) { ?>
  <section class="related-products">
	<div class="container container-fluid">
	  <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		  <h1 class="section-title"><span><?php _e( 'Relacionados', 'maqfort' ); ?></span></h1>
		</div>
	  </div>
	  <div class="row">
		<?php
		foreach ( $related_posts as $post ) :
			setup_postdata( $GLOBALS['post'] =& $post );
			do_action( 'mf_card_loop' );
		endforeach;
		?>
	  </div>
	</div>
  </section>
	<?php
}

wp_reset_postdata();
