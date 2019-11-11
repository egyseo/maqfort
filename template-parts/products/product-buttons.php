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
		echo '<a class="btn btn-primary" data-fancybox data-src="#hidden-content" href="javascript:;" ><i class="fa fa-info" aria-hidden="true"></i>' , esc_html__( 'Peça mais informações', 'maqfort' ) , '</a>';
	endif;
	?>
	<div style="display: none;" id="hidden-content">
		<div id="more-info-form-wrapper">
			<?php echo do_shortcode( $more_info ); ?>
		</div>
	</div>
</div>
