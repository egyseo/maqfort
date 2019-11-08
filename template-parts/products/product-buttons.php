<?php
/**
 * -----------------------------------------------------------
 * The buttons on the product to get more info.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$more_info = get_theme_mod( 'product_form' );

?>
<div class="product-buttons">
	<?php
	if ( $more_info ) :
		echo '<button type="button" name="button" class="btn btn-rpimary" href="#contact_form_pop"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>' , esc_html__( 'Mais informaçlões', 'maqfort' ) , '</button>';
	endif;
	?>
	<div style="display:none" class="fancybox-hidden">
		<div id="contact_form_pop" style="height: 80vh;">
			<?php echo do_shortcode( $more_info ); ?>
		</div>
	</div>
</div>
