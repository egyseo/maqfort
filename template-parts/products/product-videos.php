<?php
/*
 * -----------------------------------------------------------
 * Video section to show product videos.
 * -----------------------------------------------------------
 */

$videoGallery = get_post_meta(get_the_ID(), '_mf_products_video_galerie', true);

?>
<?php if($videoGallery) : ?>
<section class="product-video-gallerie">
  <div class="container container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="section-title"><span><?php _e( 'Video Galerie', 'maqfort' ); ?></span></h1>
      </div>
    </div>
    <div class="row">
      <?php
        foreach ((array)$videoGallery as $videoId => $video) :
          $videoUrl = $videoImage = '';
          if (isset($video['_mf_products_embed'])) :
            $videoUrl = esc_url($video['_mf_products_embed']);
          endif;
          if (isset($video['_mf_products_image'])) :
            $videoImage = wp_get_attachment_url($video['_mf_products_image_id']);
          endif;
          if ($videoUrl || $videoImage) :
            ?>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
              <a href="<?php echo esc_url($videoUrl); ?>" data-fancybox="video-group">
                <img src="<?php echo esc_url($videoImage); ?>" alt="video-images">
              </a>
            </div>
            <?php
          endif;
        endforeach;
      ?>
    </div>
  </div>
</section>
<?php endif; ?>
