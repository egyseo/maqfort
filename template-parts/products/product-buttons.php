<?php
/**
 * -----------------------------------------------------------
 * The buttons on the product to get more info.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$more_info = get_theme_mod( 'mf_product_form' );

?>
<div class="product-buttons">
	<?php
	if ( $more_info ) :
		echo '<a class="btn btn-primary" data-fancybox data-src="#hidden-content" href="javascript:;" ><i class="fa fa-info" aria-hidden="true"></i>' , esc_html__( 'Mais informações', 'maqfort' ) , '</a>';
	endif;
	?>
	<button class="btn btn-print" onclick="printPage()"><i class="fa fa-print" aria-hidden="true"></i><?php esc_html_e( 'Imprimir este produto', 'maqfort' ); ?></button>
	<div style="display: none;" id="hidden-content">
		<div id="more-info-form-wrapper">
			<?php echo do_shortcode( $more_info ); ?>
		</div>
	</div>
</div>
