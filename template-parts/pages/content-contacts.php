<?php
  $address_prefix = '_maqfort_address_';
  $address_title = get_post_meta( get_the_ID(), $address_prefix . 'title', true );
  $address_address = get_post_meta( get_the_ID(), $address_prefix . 'address', true );
  $address_phone = get_post_meta( get_the_ID(), $address_prefix . 'phone', true );
  $address_email = get_post_meta( get_the_ID(), $address_prefix . 'email', true );
  $contact_form_prefix = 'maqfort_contact_form_';
  $contact_form_title = get_post_meta( get_the_ID(), $contact_form_prefix . 'title', true );
  $contact_form_desc = get_post_meta( get_the_ID(), $contact_form_prefix . 'description', true );
  $contact_form_shorcode = get_post_meta( get_the_ID(), $contact_form_prefix . 'shortcode', true );
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( has_post_thumbnail() ) { ?>

    <header class="page-header-with-img" style="background-color:#525254;background-image:url(<?php the_post_thumbnail_url('full'); ?>); background-position:center; background-repeat:no-repeat; background-size:cover;">
    </header>
    <section class="page-content">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <section class="contact-address">
              <?php if ( ! empty( $address_title ) ) {
                echo '<h2 class="address-title">' . esc_html( $address_title ). '</h2>';
              }
              if ( ! empty( $address_address ) ) {
                echo '<p class="address">' . $address_address . '</p>';
              }
              if ( ! empty( $address_phone ) ) {
                echo '<p class="address-phone">' . esc_html( 'Phone: ', 'maqfort' ) . '<a href="tel:' . esc_html( $address_phone ) . '">' . esc_html( $address_phone ) . '</a></p>';
              }
              if ( ! empty( $address_email ) ) {
                echo '<a href="mailto:' . esc_html( $address_email ) . '" class="address-mailto">' .  __( 'Send email', 'maqfort' ) . '</a>';
              } ?>
            </section>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div id="map-maqfort"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.0713707660766!2d-8.543199684289153!3d41.43767300083858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2459da3af7f5ab%3A0xf70a34e8efcc7c19!2sMAQFORT!5e0!3m2!1spt-PT!2spt!4v1507909111738" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe></div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-form">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if ( ! empty( $contact_form_title ) ) {
              echo '<h2 class="contact-form-title">' . esc_html( $contact_form_title ) . '</h2>';
            }
            if ( ! empty( $contact_form_desc ) ) {
              echo '<p>' . esc_html( $contact_form_desc ) . '</p>';
            }

            echo do_shortcode( $contact_form_shorcode ); ?>
          </div>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <header class="page-header">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
          </div>
        </div>
      </div>
    </header>
    <section class="page-content">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <section class="contact-address">
              <?php if ( ! empty( $address_title ) ) {
                echo '<h2 class="address-title">' . esc_html( $address_title ). '</h2>';
              }
              if ( ! empty( $address_address ) ) {
                echo '<p class="address">' . $address_address . '</p>';
              }
              if ( ! empty( $address_phone ) ) {
                echo '<p class="address-phone">' . esc_html( 'Phone: ', 'maqfort' ) . '<a href="tel:' . esc_html( $address_phone ) . '">' . esc_html( $address_phone ) . '</a></p>';
              }
              if ( ! empty( $address_email ) ) {
                echo '<a href="mailto:' . esc_html( $address_email ) . '" class="address-mailto">' .  __( 'Send email', 'maqfort' ) . '</a>';
              } ?>
            </section>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div id="map-maqfort"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.0713707660766!2d-8.543199684289153!3d41.43767300083858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2459da3af7f5ab%3A0xf70a34e8efcc7c19!2sMAQFORT!5e0!3m2!1spt-PT!2spt!4v1507909111738" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe></div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-form">
      <div class="container container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if ( ! empty( $contact_form_title ) ) {
              echo '<h2 class="contact-form-title">' . esc_html( $contact_form_title ) . '</h2>';
            }
            if ( ! empty( $contact_form_desc ) ) {
              echo '<p>' . esc_html( $contact_form_desc ) . '</p>';
            }

            echo do_shortcode( $contact_form_shorcode ); ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
</article>
