<?php

$taxonomies = get_terms( array(
  'taxonomy' => 'mf_tipos_de_produtos',
  'hide_empty' => true,
  'parent'   => 0,
  'orderby' => 'menu_order',
  'order' => 'ASC'
) );

$productsArchiveUrl = get_post_type_archive_link( 'mf_produtos' );

if($taxonomies) : ?>
  <section id="home-products">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section-title-wrapper">
            <h2 class="section-title"><span><a href="<?php echo $productsArchiveUrl; ?>"><?php _e( 'Produtos', 'maqfort' ); ?></a></span></h2>
            <a class="see-all" href="<?php echo $productsArchiveUrl; ?>"><?php _e('Ver todos produtos', 'maqfort'); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="flex-products">
            <ul class="slides">
              <?php
                foreach( $taxonomies as $term ) {
                  if( $term->parent == 0 ) {
                    if ( get_term_meta( $term->term_id, 'customtaxonomie_mb_showon_home', 1 ) ) {
                      $term_link = get_term_link( $term );
                      $image = wp_get_attachment_image( get_term_meta( $term->term_id, 'customtaxonomie_mb_image_id', 1) , 'full' );
                      $output = '<li><article class="product-card"><header class="produc-card-header">';
                      if(!empty($image)) :
                        $output .= '<a href="' . esc_url($term_link) . '"><figure class="product-card-thumbnail">' . $image . '</figure></a>';
                      else :
                        $output .= '<a href="' . esc_url($term_link) . '"><figure class="product-card-thumbnail"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="imagem provisória"></figure></a>';
                      endif;
                      $output .= '</header>';
                      $output .= '<div class="product-card-content"><a href="' . esc_url($term_link) . '"><h2 class="product-card-title">' . esc_attr($term->name) . '</h2></a>';
                      $output .= '<p class="card-desc">' . mf_truncate(esc_html($term->description), 90) . '</p></div>';
                      $output .= '<footer class="product-card-footer"><a href="' . esc_url($term_link) . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></footer></article><li>';
                      echo $output;
                    }
                  }
                }
             ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif;
