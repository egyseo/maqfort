<?php
/**
 * -----------------------------------------------------------
 * The buttons on the product single page.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$getQuote    = get_theme_mod( 'product_form' );
$mainCatalog = get_theme_mod( 'products_catalogue_button' );
// $extraInfo = get_post_meta(get_the_ID(), '_mf_produtos_extra_info_id', true);

?>
<div class="product-buttons">
	<?php
	/*
	if($extraInfo) :
	  echo '<a class="button-catalog extra-info" href="' , wp_get_attachment_url($extraInfo) , '" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i>' , __('Mais Detalhes', 'maqfort' ) , '</a>';
	endif;*/
	if ( $mainCatalog ) :
		echo '<a class="button-catalog" href="' , esc_url( $mainCatalog ) , '" target="_blank"><i class="fa fa-book" aria-hidden="true"></i>' , __( 'Catálogo', 'maqfort' ) , '</a>';
	endif;
	if ( $getQuote ) :
		echo '<button type="button" name="button" class="button-getquote" href="#contact_form_pop"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>' , __( 'Pedir Orçamento', 'maqfort' ) , '</button>';
	endif;
	?>
  <div style="display:none" class="fancybox-hidden">
	<div id="contact_form_pop" style="height: 80vh;">
		<?php echo do_shortcode( $getQuote ); ?>
	</div>
  </div>
</div>
