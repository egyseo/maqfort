<?php
/**
 * -----------------------------------------------------------
 * The buttons on the product to get more info.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$more_info           = get_theme_mod( 'mf_product_form' );
$catalogo_geral      = get_theme_mod( 'mf_products_catalogue_button' );
$catalogo_individual = get_post_meta( get_the_ID(), '_mf_produtos_catalogo_individual', true );
$tabelas             = get_post_meta( get_the_ID(), '_mf_produtos_catalogo_tables', true );

?>
<div class="product-buttons">
	<?php
	if ( $more_info ) :
		echo '<a class="btn btn-primary" data-fancybox data-src="#hidden-form" href="javascript:;" >' , esc_html__( 'Peça mais informações', 'maqfort' ) , '<i class="fa fa-info" aria-hidden="true"></i></a>';
	endif;
	if ( ! empty( $catalogo_geral ) ) :
		echo '<a class="btn btn-secondary" data-fancybox data-src="#modal" href="javascript:;">' , esc_html__( 'Ver Catálogos', 'maqfort' ) , '<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
	endif;
	?>
	<div style="display: none;" id="hidden-form">
		<div id="more-info-form-wrapper">
			<?php echo do_shortcode( $more_info ); ?>
		</div><!-- #more-info-form-wrapper -->
	</div><!-- #hidden-form -->
</div><!-- product-buttons -->
<div style="display: none;" id="modal">
	<div class="buttons-wrapper">
		<?php
		echo '<p class="buttons-title">' , __( 'Download de Catálogo', 'maqfort' ) , '</p><div class="buttons-container">';
		if ( ! empty( $catalogo_geral ) ) :
			echo '<div class="button-content"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><p>' , __( 'Catalogo Geral', 'maqfort' ) , '</p><a download href="' , esc_url( $catalogo_geral ) , '" class="btn btn-primary btn-download">' , __( 'Download', 'maqfort' ) , '<i class="fa fa-download" aria-hidden="true"></i></a></div>';
		endif;
		if ( ! empty( $catalogo_individual ) ) :
			echo '<div class="button-content"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><p>' , __( 'Catalogo Individual', 'maqfort' ) , '</p><a download href="' , esc_url( $catalogo_individual ) , '" class="btn btn-primary btn-download">' , __( 'Download', 'maqfort' ) , '<i class="fa fa-download" aria-hidden="true"></i></a></div>';
		endif;
		if ( ! empty( $tabelas ) ) :
			echo '<div class="button-content"><i class="fa fa-file-excel-o" aria-hidden="true"></i><p>' , __( 'Tabelas', 'maqfort' ) , '</p><a download href="' , esc_url( $tabelas ) , '" class="btn btn-primary btn-download">' , __( 'Download', 'maqfort' ) , '<i class="fa fa-download" aria-hidden="true"></i></a></div></div>';
		endif;
		?>
	</div>
</div>
