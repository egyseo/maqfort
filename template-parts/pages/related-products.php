<?php
/*
 * -----------------------------------------------------------
 * Related Products Section.
 * -----------------------------------------------------------
 */

/* Snippet form : https://teamtreehouse.com/community/wordpress-related-posts-with-the-same-taxonomy-but-not-the-current-post */
$post_terms = wp_get_object_terms($post->ID, 'mf_tipos_de_produtos', array('fields'=>'ids'));

$relatedProductsArgs = array(
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

$relatedProducts = new WP_Query( $relatedProductsArgs );

if ($relatedProducts->have_posts()) : ?>

  <section class="related-products">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php _e('Relacionados', 'maqfort'); ?></h3>
        </div>
      </div>
      <div class="row">

  <?php while ( $relatedProducts->have_posts() ) : ?>

    <?php $relatedProducts->the_post(); ?>
    <?php do_action( 'mf_loop' ); ?>

  <?php endwhile; ?>
      </div>
    </div>
  </section>

<?php endif;

wp_reset_postdata();
