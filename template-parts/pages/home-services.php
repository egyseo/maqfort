<section id="home-services">
  <div class="container container-fluid">
    <div class="row">

      <?php
      $service_itens = get_post_meta( get_the_ID(), '_maqfort_homepage_itens', true );

      if ( $service_itens ) {

        foreach ( (array)$service_itens as $key => $service ) {

          $service_title = $service_description = $service_btn = $service_url = $service_image = '';

          if ( isset( $service[ '_maqfort_homepage_title' ] ) )
            $service_title = esc_html( $service[ '_maqfort_homepage_title' ] );

          if ( isset( $service[ '_maqfort_homepage_description' ] ) )
            $service_description = esc_html( $service[  '_maqfort_homepage_description' ] );

          if ( isset( $service[ '_maqfort_homepage_btn' ] ) )
            $service_btn = esc_html( $service[  '_maqfort_homepage_btn' ] );

          if ( isset( $service[ '_maqfort_homepage_url' ] ) )
            $service_url = esc_html( $service[  '_maqfort_homepage_url' ] );

          if ( isset( $service[ '_maqfort_homepage_image' ] ) )
            $service_image = wp_get_attachment_url( $service[ '_maqfort_homepage_image_id' ] );

          if ( !empty( array( $service_title ) ) ) {

            echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><div class="service-box">' . '<img src="'. $service_image . '"><h2 class="service-title">' . $service_title . '</h2><p>' . $service_description . '</p><a href="' . $service_url . '" target="_self" class="service-btn">' . $service_btn . '</a></div></div>';

          }

        }

      }
      ?>

    </div>
  </div>
</section>
