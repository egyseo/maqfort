<section id="home-services">
  <div class="container-fluid">
    <div class="row middle-xs middle-sm middle-md middle-lg">

      <?php
      $service_itens = get_post_meta( get_the_ID(), '_maqfort_homepage_itens', true );

      if ( $service_itens ) {

        foreach ( (array)$service_itens as $key => $service ) {

          $service_title = $service_url = $service_image = '';

          if ( isset( $service[ '_maqfort_homepage_title' ] ) )
            $service_title = esc_html( $service[ '_maqfort_homepage_title' ] );

          if ( isset( $service[ '_maqfort_homepage_url' ] ) )
            $service_url = esc_html( $service[  '_maqfort_homepage_url' ] );

          if ( isset( $service[ '_maqfort_homepage_image' ] ) )
            $service_image = wp_get_attachment_url( $service[ '_maqfort_homepage_image_id' ] );

          if ( !empty( array( $service_title ) ) ) {

            //echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="service-bg"style="background-image:url(' . $service_image . '); background-position:center background-repeat:no-repeat; background-size:cover;"><a href="' . $service_url . '" target="_self"><div class="service-box">' . '<h2 class="service-title">' . $service_title . '</h2></div></a></div></div>';

            echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><a class="service-box" href="' . $service_url . '"><img class="service-bg" src="' . $service_image . '"><div class="service-overlay"><span><i class="fa fa-plus"></i><p class="service-title">' . $service_title . '</p></span></div></a></div>';


          }

        }

      }
      ?>

    </div>
  </div>
</section>
