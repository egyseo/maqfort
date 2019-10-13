<?php
get_header();

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
          <?php // Start the Loop.
          $taxonomies = get_terms( array(
              'taxonomy' => 'categorias_de_produtos',
              'hide_empty' => false
          ) );

          if ( !empty($taxonomies) ) :
              $output = '<select>';
              foreach( $taxonomies as $category ) {
                  if( $category->parent == 0 ) {
                      $output.= '<optgroup label="'. esc_attr( $category->name ) .'">';
                      foreach( $taxonomies as $subcategory ) {
                          if($subcategory->parent == $category->term_id) {
                          $output.= '<option value="'. esc_attr( $subcategory->term_id ) .'">
                              '. esc_html( $subcategory->name ) .'</option>';
                          }
                      }
                      $output.='</optgroup>';
                  }
              }
              $output.='</select>';
              echo $output;
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
    <?php
    else :
    get_template_part( 'template-parts/content/content', 'none' );
    ?>
  </article>
  <?php
endif;
get_footer();
