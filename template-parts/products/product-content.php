<?php
/**
 * -----------------------------------------------------------
 * The content of product single.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_small_description = get_post_meta( get_the_ID(), '_mf_produtos_wysiwyg', true );
$is_industry40             = get_post_meta( get_the_ID(), '_mf_produtos_industry', 1 );
$is_hyperhterm             = get_post_meta( get_the_ID(), '_mf_produtos_hypertherm', 1 );
$hypertherm_image          = get_theme_mod( 'mf_products_hypherterm' );
$terms_list                = get_the_terms( get_the_ID(), 'mf_tipos_de_produtos' );
$product_title             = get_the_title( get_the_ID() );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'breadcrumbs' ); ?>
	<section class="product-content">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<?php echo '<h1 class="product-title product-title-mobile">' , esc_html( $product_title ) , '</h1>'; ?>
					<?php get_template_part( 'template-parts/products/product', 'gallery' ); ?>
				</div><!-- .col -->
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<?php
					echo '<h1 class="product-title product-title-desktop">' , esc_html( $product_title ) , '</h1>';

					echo '<div class="product-small-description">' , wp_kses_post( wpautop( $product_small_description ) ) , '</div><div class="product-cat-and-print-container">';

					foreach ( $terms_list as $term_name ) :
						$term_link = get_term_link( $term_name, array( 'mf_tipos_de_produtos' ) );
						echo '<p class="product-cat"><span>' , esc_html__( 'Categoria: ', 'maqfort' ) , '</span><a href="' , esc_url( $term_link ) , '">' , esc_html( $term_name->name ) , '</a></p><button class="btn btn-print" onclick="printPage()"><i class="fa fa-print" aria-hidden="true"></i>' , esc_html__( 'Imprimir este produto', 'maqfort' ) , '</button></div>';
					endforeach;

					if ( $is_industry40 ) :
						echo '<div class="is-industry40"><p>' , esc_html( __( 'Indústria 4.0', 'maqfort' ) ) , '</p><a href="#industry-block">' , esc_html( __( 'O que é? Saiba mais aqui', 'maqfort' ) ) , '<i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>';
					endif;
					if ( $is_hyperhterm && $hypertherm_image ) :
						echo '<div class="is-hypertherm"><p>' , esc_html( __( 'Equipado com:', 'maqfort' ) ) , '</p><img src="' , esc_url( $hypertherm_image ) , '" alt="hyperterm Highperformance Plasma" /></div>';
					endif;

					?>
					<?php get_template_part( 'template-parts/products/product', 'buttons' ); ?>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .product-content -->
	<?php get_template_part( 'template-parts/products/product', 'tabs' ); ?>
	<?php get_template_part( 'template-parts/products/products', 'related' ); ?>
</article><!-- .product-article -->
