<?php
  $contactsTitle = get_post_meta( get_the_ID(), '_mf_contacts_title', true );
  $contactsAddress = get_post_meta( get_the_ID(), '_mf_contacts_address', true );
  $contactsPhone = get_post_meta( get_the_ID(), '_mf_contacts_phone', true );
  $contactsEmail = get_post_meta( get_the_ID(), '_mf_contacts_email', true );
  $contactsMap = get_post_meta( get_the_ID(), '_mf_contacts_map', true );
  $contactsFormTitle = get_post_meta( get_the_ID(), '_mf_contacts_form_title', true );
  $contactsFormDesc = get_post_meta( get_the_ID(), '_mf_contacts_form_description', true );
  $contactsFormShorcode = get_post_meta( get_the_ID(), '_mf_contacts_form_shortcode', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>

	<header class="page-header-with-img" style="background-color:#525254;background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>); background-position:center; background-repeat:no-repeat; background-size:cover;">
	</header>
	<section class="address-wrapper">
	  <div class="address">
		<div class="address-content">
		  <?php
			the_title( '<h1 class="page-title"><span>', '</span></h1>' );
			if ( ! empty( $contactsTitle ) ) {
				echo '<h2 class="address-title">' , esc_html( $contactsTitle ) , '</h2>';
			}
			if ( ! empty( $contactsAddress ) ) {
				echo '<p class="address-address">' , $contactsAddress , '</p>';
			}
			if ( ! empty( $contactsPhone ) ) {
				echo '<p class="address-phone">' , esc_html( 'Telefone: ', 'maqfort' ) , '<a href="tel:' , esc_html( $contactsPhone ) , '">' , esc_html( $contactsPhone ) , '</a></p>';
			}
			if ( ! empty( $contactsEmail ) ) {
				echo '<a href="mailto:' , esc_html( $contactsEmail ) , '" class="address-mailto">' ,  __( 'Enviar email', 'maqfort' ) , '</a>';
			}
			?>
		</div>
	  </div>
	  <div class="map-wrapper">
		<?php
		if ( ! empty( $contactsMap ) ) {
			echo $contactsMap;
		}
		?>
	  </div>
	</section>
	<section class="contact-form">
	  <div class="container container-fluid">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php
			if ( ! empty( $contactsFormTitle ) ) {
				echo '<h2 class="contact-form-title">' , esc_html( $contactsFormTitle ) , '</h2>';
			}
			if ( ! empty( $contactsFormDesc ) ) {
				echo '<p>' , esc_html( $contactsFormDesc ) , '</p>';
			}
			echo do_shortcode( $contactsFormShorcode );
			?>
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
	<section class="address-wrapper">
	  <div class="address">
		<div class="address-content">
		  <?php
			the_title( '<h1 class="page-title"><span>', '</span></h1>' );
			if ( ! empty( $contactsTitle ) ) {
				echo '<h2 class="address-title">' , esc_html( $contactsTitle ) , '</h2>';
			}
			if ( ! empty( $contactsAddress ) ) {
				echo '<p class="address-address">' , $contactsAddress , '</p>';
			}
			if ( ! empty( $contactsPhone ) ) {
				echo '<p class="address-phone">' , esc_html( 'Telefone: ', 'maqfort' ) , '<a href="tel:' , esc_html( $contactsPhone ) , '">' , esc_html( $contactsPhone ) , '</a></p>';
			}
			if ( ! empty( $contactsEmail ) ) {
				echo '<a href="mailto:' , esc_html( $contactsEmail ) , '" class="address-mailto">' ,  __( 'Enviar email', 'maqfort' ) , '</a>';
			}
			?>
		</div>
	  </div>
	  <div class="map-wrapper">
		<?php
		if ( ! empty( $contactsMap ) ) {
			echo $contactsMap;
		}
		?>
	  </div>
	</section>
	<section class="contact-form">
	  <div class="container container-fluid">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php
			if ( ! empty( $contactsFormTitle ) ) {
				echo '<h2 class="contact-form-title">' , esc_html( $contactsFormTitle ) , '</h2>';
			}
			if ( ! empty( $contactsFormDesc ) ) {
				echo '<p>' , esc_html( $contactsFormDesc ) , '</p>';
			}

			echo do_shortcode( $contactsFormShorcode );
			?>
		  </div>
		</div>
	  </div>
	</section>
	<?php } ?>
</article>
