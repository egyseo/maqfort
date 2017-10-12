<?php
  $maqfort_address_prefix = '_maqfort_address_';
  $maqfort_address_title = get_post_meta( get_the_ID(), $maqfort_address_prefix . 'title', true );
  $maqfort_address_address = get_post_meta( get_the_ID(), $maqfort_address_prefix . 'address', true );
  $maqfort_address_phone = get_post_meta( get_the_ID(), $maqfort_address_prefix . 'phone', true );
  $maqfort_address_email = get_post_meta( get_the_ID(), $maqfort_address_prefix . 'email', true );
  $contact_form_prefix = 'maqfort_contact_form_';
  $contact_form_title = get_post_meta( get_the_ID(), $contact_form_prefix . 'title', true );
  $contact_form_desc = get_post_meta( get_the_ID(), $contact_form_prefix . 'description', true );
  $contact_form_sc = get_post_meta( get_the_ID(), $contact_form_prefix . 'shortcode', true );
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
            <h2 class="address-title"><?php echo esc_html( $maqfort_address_title ); ?></h2>
            <p><?php echo $maqfort_address_address ?></p>
            <p><?php esc_html_e( 'Tel.', 'maqfort' ); ?> <a href="tel:<?php echo esc_html( $maqfort_address_phone ) ?>"><?php echo esc_html( $maqfort_address_phone ); ?></a></p>
            <a href="mailto:<?php echo esc_html( $maqfort_address_email ) ?>"><?php _e( 'Send email', 'maqfort' ); ?></a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p>mapa</p>
          </div>
        </div>
        <section class="contact-form">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h2 class="contact-form-title"><?php echo esc_html( $contact_form_title ); ?></h2>
              <p> <?php echo esc_html( $contact_form_desc ); ?> </p>
              <?php echo do_shortcode( $contact_form_sc ); ?>
            </div>
          </div>
        </section>
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
            <h2 class="address-title"><?php echo esc_html( $maqfort_address_title ); ?></h2>
            <p><?php echo $maqfort_address_address ?></p>
            <p><?php esc_html_e( 'Tel.', 'maqfort' ); ?> <a href="tel:<?php echo esc_html( $maqfort_address_phone ) ?>"><?php echo esc_html( $maqfort_address_phone ); ?></a></p>
            <a href="mailto:<?php echo esc_html( $maqfort_address_email ) ?>"><?php _e( 'Send email', 'maqfort' ); ?></a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p>mapa</p>
          </div>
        </div>
        <section class="contact-form">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h2 class="contact-form-title"><?php echo esc_html( $contact_form_title ); ?></h2>
              <p> <?php echo esc_html( $contact_form_desc ); ?> </p>
              <?php echo do_shortcode( $contact_form_sc ); ?>
            </div>
          </div>
        </section>
        </div>
      </div>
    </section>
  <?php } ?>
</article>
