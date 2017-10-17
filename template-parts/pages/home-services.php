<section id="home-services">
  <div class="container-fluid">
    <div class="row middle-xs middle-sm middle-md middle-lg">

      <?php
      $service_itens = get_post_meta( get_the_ID(), '_maqfort_homepage_itens', true );

      if ( $service_itens ) {

        foreach ( (array)$service_itens as $key => $service ) {

          $service_title = $service_description = $service_url = $service_image = '';

          if ( isset( $service[ '_maqfort_homepage_title' ] ) )
            $service_title = esc_html( $service[ '_maqfort_homepage_title' ] );

          if ( isset( $service[ '_maqfort_homepage_description' ] ) )
            $service_description = esc_html( $service[  '_maqfort_homepage_description' ] );

          if ( isset( $service[ '_maqfort_homepage_url' ] ) )
            $service_url = esc_html( $service[  '_maqfort_homepage_url' ] );

          if ( isset( $service[ '_maqfort_homepage_image' ] ) )
            $service_image = wp_get_attachment_url( $service[ '_maqfort_homepage_image_id' ] );

          if ( !empty( array( $service_title ) ) ) {

            echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><a href="' . $service_url . '" target="_self"><div class="service-box">' . '<img src="'. $service_image . '"><h2 class="service-title">' . $service_title . '</h2><p>' . $service_description . '</p></div></a></div>';

          }

        }

      }
      ?>

    </div>
  </div>
</section>
