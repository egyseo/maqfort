<?php

get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
        </div>
      </div>
    </div>
  </header>
  <section class="page-content">
    <div class="container container-fluid">
      <div class="row">
        <?php

        $taxonomy = 'product-category';
        $args = array(
        	'orderby' => 'id',
        	'order' => 'ASC',
        );

        $taxonomy_terms = get_terms($taxonomy, $args);

        if($taxonomy_terms) {

        	foreach($taxonomy_terms as $taxonomy_term) {
            $term_link = get_term_link( $taxonomy_term );
            $image_id = get_term_meta( $taxonomy_term->term_id, 'image', true );
            $image_data = wp_get_attachment_image_src( $image_id, 'full' );
            $image = $image_data[0]; ?>

              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <article class="product-card">
                  <header class="product-card-header">
                    <?php if ( ! empty( $image ) ) { ?>
                      <a href="<?php echo esc_url( $term_link ); ?>" title="">
                        <figure class="product-card-thumbnail">
                          <?php echo '<img src="' . esc_url( $image ) . '" />'; ?>
                        </figure>
                      </a>
                    <?php } ?>
                  </header>
                  <section class="product-card-content">
                    <h3 class="product-card-title"><a href="<?php echo esc_url( $term_link ); ?>" title=""><?php echo $taxonomy_term->name; ?></a></h3>
                  </section>
                </article>
              </div>
            <?php }
        } ?>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <?php maqfort_pagination(); ?>
        </div>
      </div>
    </div>
  </section>
</article>

<?php get_footer();
