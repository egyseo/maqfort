<article class="product-article" id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
  <section class="product-content">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <?php the_title( '<h1 class="product-title hide">', '</h1>' ); ?>
          <section class="slider-wrapper">
            <div id="product-featured-imgs" class="flexslider">
              <ul class="slides">
                <?php
                  $ft_images = get_post_meta(  get_the_ID(), '_mf_produtos_gallerie', true);
                    if ( $ft_images ) {
                      foreach ( $ft_images as $attachment_id => $img_full_url ) {
                       $full = wp_get_attachment_image($attachment_id, 'full');
                       $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                       $url = wp_get_attachment_url( $attachment_id );
                         echo '<li>';
                         echo '<a href="' . $url . '" data-fancybox="group"  data-caption="'. $alt .'" >';
                         echo $full;
                         echo '</a>';
                         echo '</li>';
                      }
                    }
                ?>
              </ul><!-- slides ends -->
            </div><!-- featured img products slider ends -->
            <div id="product-carousel-galerie" class="flexslider">
              <ul class="slides">
                <?php $carousel_images = get_post_meta(  get_the_ID(), '_mf_produtos_carousel', true);
                  if ( $carousel_images ) {
                    foreach ( $carousel_images as $attachment_id => $img_full_url ) {
                     $full = wp_get_attachment_image($attachment_id, 'full');
                     $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                     $url = wp_get_attachment_url( $attachment_id );
                       echo '<li>';
                       echo '<a href="' . $url . '" data-fancybox="group"  data-caption="'. $alt .'" >';
                       echo $full;
                       echo '</a>';
                       echo '</li>';
                    }
                  } ?>
              </ul>
            </div>
          </section>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <?php the_title( '<h1 class="product-title">', '</h1>' ); ?>
          <?php the_content(); ?>
          <div class="product-buttons">
            <?php
              $get_quote = get_theme_mod('product_form');
              $catalog = get_theme_mod('products_catalogue_button');
              $extraInfo = get_post_meta(get_the_ID(), '_mf_produtos_extra_info_id', true);
              if($extraInfo) :
                echo '<a class="button-catalog extra-info" href="' , wp_get_attachment_url($extraInfo) , '" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i>' , __('Mais Detalhes', 'maqfort' ) , '</a>';
              endif;
              if($catalog) :
                echo '<a class="button-catalog" href="' , esc_url($catalog) , '" target="_blank"><i class="fa fa-book" aria-hidden="true"></i>' , __( 'Catálogo', 'maqfort' ) , '</a>';
              endif;
              if($get_quote) :
                echo '<button type="button" name="button" class="button-getquote" href="#contact_form_pop"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>' , __( 'Pedir Orçamento', 'maqfort' ) , '</button>';
              endif; ?>
            <div style="display:none" class="fancybox-hidden">
                <div id="contact_form_pop" style="height: 80vh;">
                    <?php echo do_shortcode( $get_quote ); ?>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php $video_galerie = get_post_meta( get_the_ID(), '_mf_products_video_galerie', true ); ?>
  <?php if($video_galerie) : ?>
  <section class="product-video-gallerie">
    <div class="container container-fluid">
      <?php
        if ( !empty( $video_galerie ) ) {
          ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h1 class="section-title"><span><?php _e( 'Video Galerie', 'maqfort' ); ?></span></h1>
            </div>
          </div> <?php
        } ?>
      <div class="row">
        <?php
          foreach ( (array)$video_galerie as $key => $item) {
            $vg_url = $vg_image = '';
            if ( isset( $item[ '_mf_products_embed' ] ) )
                   $vg_url = esc_url( $item[ '_mf_products_embed' ] );
            if ( isset( $item[ '_mf_products_image' ] ) )
                   $vg_image = wp_get_attachment_url( $item[ '_mf_products_image_id' ] );
            if ( !empty( array( $vg_url ) ) ) { ?>
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <a href="<?php echo $vg_url ?>" data-fancybox="video-group">
                  <img src="<?php echo $vg_image ?>" alt="">
                </a>
              </div><?php
            }
          } ?>
      </div>
    </div>
  </section>
<?php endif; ?>
  <?php get_template_part( 'template-parts/pages/related', 'products' ); ?>
  <?php get_template_part( 'template-parts/post/related', 'news' ); ?>
</article>
