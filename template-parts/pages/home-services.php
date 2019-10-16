<section id="home-services">
  <div class="container container-fluid">
    <div class="row">
      <?php
      $service_itens = get_post_meta( get_the_ID(), '_mf_homepage_itens', true );
      if ($service_itens) {
        foreach ( (array)$service_itens as $key => $service ) {
          $service_title = $service_url = $service_image = $service_icon = '';
          if ( isset( $service[ '_mf_homepage_title' ] ) )
            $service_title = esc_html( $service[ '_mf_homepage_title' ] );
          if ( isset( $service[ '_mf_homepage_url' ] ) )
            $service_url = esc_html( $service[  '_mf_homepage_url' ] );
          if ( isset( $service[ '_mf_homepage_image' ] ) )
            $service_image = wp_get_attachment_url( $service[ '_mf_homepage_image_id' ] );
          if ( isset( $service[ '_mf_homepage_icon' ] ) )
            $service_icon = esc_html( $service[  '_mf_homepage_icon' ] );
          if ( !empty( array( $service_title ) ) ) {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <a class="service-box" href="<?php echo $service_url; ?>">
                <div class="service-image-box">
                  <?php if($service_image) : ?>
                    <img class="service-image" src="<?php echo $service_image; ?>" alt="<?php echo $service_title; ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/placeholder.png" alt="imagem provisória">
                  <?php endif; ?>
                  <div class="service-content-box">
                    <div class="service-content">
                      <?php
                      if($service_icon) :
                        echo '<i class="fa ' , $service_icon , '" aria-hidden="true"></i>';
                      endif;
                      ?>
                      <p class="service-title">
                        <?php echo $service_title; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <?php
          }
        }
      }
      ?>
    </div>
  </div>
</section>
