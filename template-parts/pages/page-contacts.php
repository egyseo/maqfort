<?php
/**
 * -----------------------------------------------------------
 * Page contacts template
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$add_class      = '';
$add_css        = '';
$thumbnail      = get_the_post_thumbnail_url( get_the_ID(), 'maqfort-header' );
$banner_overlay = get_theme_mod( 'mf_page_headers_banners_overlay' );

if ( has_post_thumbnail() ) :
	$add_class = 'page-header-background';
	$add_css   = 'style="background-image: linear-gradient( ' . esc_attr( $banner_overlay ) . ', ' . esc_attr( $banner_overlay ) . ' ), url(' . $thumbnail . ');"';
endif;

$contacts_address          = get_post_meta( get_the_ID(), '_mf_contacts_address_group', true );
$contacts_map              = get_post_meta( get_the_ID(), '_mf_contacts_map', true );
$contacts_form_title       = get_post_meta( get_the_ID(), '_mf_contacts_form_title', true );
$contacts_form_description = get_post_meta( get_the_ID(), '_mf_contacts_form_description', true );
$contacts_form_shortcode   = get_post_meta( get_the_ID(), '_mf_contacts_form_shortcode', true );


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_html( $add_class ); ?>"  <?php echo wp_kses_post( $add_css ); ?> >
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
			<?php
			if ( $contacts_address ) :
				foreach ( (array) $contacts_address as $address_id => $address ) :
					$address_title  = '';
					$address_street = '';
					$address_phone  = '';
					$address_email  = '';
					if ( isset( $address ['title'] ) ) :
						$address_title = $address['title'];
					endif;
					if ( isset( $address ['address'] ) ) :
						$address_street = $address['address'];
					endif;
					if ( isset( $address ['phone'] ) ) :
						$address_phone = $address['phone'];
					endif;
					if ( isset( $address ['email'] ) ) :
						$address_email = $address['email'];
					endif;
					if ( ! empty( $address_street ) ) :
						echo '<div class="address-content">';
						echo '<h2 class="address-title">' , esc_html( $address_title ) , '</h2>';
						echo '<p class="address-address">' , wp_kses_post( $address_street ) , '</p>';
						if ( $address_phone ) :
							echo '<p class="address-phone">' , esc_html( 'Telefone: ', 'maqfort' ) , '<a href="tel:' , esc_html( $address_phone ) , '">' , esc_html( $address_phone ) , '</a></p>';
						endif;
						if ( $address_email ) :
							echo '<a href="mailto:' , esc_html( $address_email ) , '" class="address-mailto">' ,  esc_html__( 'Enviar email', 'maqfort' ) , '</a>';
						endif;
						echo '</div><!-- .address-content -->';
					endif;
				endforeach;
			endif;
			?>
		</div><!-- .address -->
		<div class="map-wrapper">
			<?php
			if ( $contacts_map ) :
				echo $contacts_map;
			endif;
			?>
		</div><!-- .map-wrapper -->
	</section><!-- .address-wrapper -->
	<section class="contact-form">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
					if ( $contacts_form_title ) :
						echo '<h2 class="contact-form-title">' , esc_html( $contacts_form_title ) , '</h2>';
					endif;
					if ( $contacts_form_description ) :
						echo '<p>' , esc_html( $contacts_form_description ) , '</p>';
					endif;
					if ( $contacts_form_shortcode ) :
						echo do_shortcode( $contacts_form_shortcode );
					endif;
					?>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .contact-form -->
</article><!-- article -->
