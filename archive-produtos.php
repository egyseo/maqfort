<?php
get_header();
wp_reset_query();
?>
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
          $taxonomies = get_terms( array(
              'taxonomy' => 'categorias_de_produtos',
              'hide_empty' => false,
              'parent'   => 0,
          ) );
          if ($taxonomies) :
            foreach( $taxonomies as $term ) {
              if( $term->parent == 0 ) {
                $term_link = get_term_link( $term );
                $image = wp_get_attachment_image( get_term_meta( $term->term_id, 'customtaxonomie_mb_image_id', 1) , 'full' );
                $output = '<div class="col-xs-12 col-md-4"><article class="card"><header class="card-header">';
                $output .= $image;
                $output .= '<a href="' . esc_url($term_link) . '"><h2>' . esc_attr($term->name) . '</h2></a>';
                /*$output .= sprintf( '<a href="%1$s"><h2>%2$s</h2></a>',
                    esc_url( get_term_link( $term->slug, $term ) ),
                    esc_html( $term->name )
                );*/
                $output .= '<p class="descrição">' . esc_html($term->description) . '</p>';
                $output .= '</header></article></div>';
                echo $output;
              }
            }
          endif;
         ?>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php mf_pagination(); ?>
          </div>
        </div>
      </div>
    </section>
  </article>
  <?php
get_footer();
