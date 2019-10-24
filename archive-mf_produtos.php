<?php
get_header();

$desc = get_theme_mod('products_archives_page_desc');
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
            <?php if($desc) : ?>
              <p><?php echo esc_html($desc); ?></p>
            <?php endif; ?>
          </div>
      </div>
    </div>
    </header>
    <?php do_action('breadcrumbs'); ?>
    <section class="page-content">
      <div class="container container-fluid">
        <div class="row">
          <?php
          $taxonomies = get_terms( array(
            'taxonomy' => 'mf_tipos_de_produtos',
            'hide_empty' => true,
            'parent'   => 0,
            'orderby' => 'menu_order',
            'order' => 'ASC'
          ) );
          if ($taxonomies) :
            foreach( $taxonomies as $term ) {
              if( $term->parent == 0 ) {
                $term_link = get_term_link( $term );
                $image = wp_get_attachment_image( get_term_meta( $term->term_id, 'customtaxonomie_mb_image_id', 1) , 'full' );
                $output = '<div class="col-xs-12 col-md-4"><article class="card"><header class="card-header">';
                if(!empty($image)) :
                  $output .= '<a href="' . esc_url($term_link) . '">' . $image . '</a>';
                else :
                  $output .= '<a href="' . esc_url($term_link) . '"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="imagem provisória"></a>';
                endif;
                $output .= '</header>';
                $output .= '<div class="card-content"><a href="' . esc_url($term_link) . '"><h2 class="card-title">' . esc_attr($term->name) . '</h2></a>';
                $output .= '<p class="card-desc">' . mf_truncate(esc_html($term->description), 90) . '</p></div>';
                $output .= '<footer class="card-footer"><a href="' . esc_url($term_link) . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></footer></article></div>';
                echo $output;
              }
            }
          endif;
         ?>
        </div>
      </div>
    </section>
  </article>
  <?php
get_footer();
