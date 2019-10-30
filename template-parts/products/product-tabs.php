<?php
/**
 * -----------------------------------------------------------
 * The tabs section on the single product page.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$product_full_description = get_post_meta( get_the_ID(), '_mf_produtos_wysiwyg', true );
$table_list               = get_post_meta( get_the_ID(), '_mf_produtos_tabelas', true );
$product_videos           = get_post_meta( get_the_ID(), '_mf_produtos_videos', true );

?>

<section class="product-tabs-wrapper">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="tabs">
					<?php
					if ( $product_full_description ) :
						echo '<button id="product-info" class="tablinks"><h3>' , esc_html__( 'Informações do Produto', 'maqfort' ) , '</h3></button>';
					endif;
					if ( $table_list ) :
						foreach ( $table_list as $table ) :
							$table_name = get_post_meta( $table, 'mf_tables_mb_table_name', true );
							echo '<button id="' , esc_html( $table_name ) , '" class="tablinks"><h3>' , esc_html( $table_name ) , '</h3></button>';
						endforeach;
					endif;
					if ( $product_videos ) :
						echo '<button id="product-videos" class="tablinks"><h3>' , esc_html__( 'Videos', 'maqfort' ) , '</h3></button>';
					endif;
					?>
				</div><!-- .tabs -->
			</div> <!-- .col -->
		</div><!-- row -->
	</div><!-- .container -->
	<div class="tab-container-wrapper">
		<?php
		if ( $product_full_description ) :
			echo '<div id="product-info-tab" class="tabcontent">';
			get_template_part( 'template-parts/products/product', 'description' );
			echo '</div><!-- #product-info-tab .tabcontent -->';
		endif;
		if ( $table_list ) :
			get_template_part( 'template-parts/products/product', 'tables' );
		endif;
		if ( $product_videos ) :
			echo '<div id="product-videos-tab" class="tabcontent">';
			get_template_part( 'template-parts/products/product', 'videos' );
			echo '</div><!-- #product-videos-tab .tabcontent -->';
		endif;
		?>
	</div><!-- .tab-container-wrapper -->

</section><!-- .product-tabs-wrapper -->
