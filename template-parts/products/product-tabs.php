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
$product_videos           = get_post_meta( get_the_ID(), '_mf_produtos_video_galerie', true );

?>

<section class="product-tables-wrapper">
	<div class="container container-fluid">
		<div class="tab">
			<?php
			if ( $product_full_description ) :
				echo '<button class="tablinks" onclick="mfNextTab(event, productDescription)"><h3>' , esc_html__( 'Informações do Produto', 'maqfort' ) , '</h3></button>';
			endif;
			if ( $table_list ) :
				foreach ( $table_list as $table ) :
					$table_name = get_post_meta( $table, 'mf_tables_mb_table_name', true );
					echo '<button class="tablinks" onclick="mfNextTab(event, ' , esc_html( $table_name ) , ')"><h3>' , esc_html( $table_name ) , '</h3></button>';
				endforeach;
			endif;
			if ( $product_videos ) :
				echo '<button class="tablinks" onclick="mfNextTab(event, productVideos)"><h3>' , esc_html__( 'Videos', 'maqfort' ) , '</h3></button>';
			endif;
			?>
		</div><!-- .tab -->
		<?php
		if ( $product_full_description ) :
			echo '<div id="productDescription" class="tabcontent">';
			get_template_part( 'template/parts/products/product', 'description' );
			echo '</div><!-- #product-full-description .tabcontent -->';
		endif;
		if ( $table_list ) :
			get_template_part( 'template/parts/products/product', 'tables' );
		endif;
		if ( $product_videos ) :
			echo '<div id="productVideos" class="tabcontent">';
			get_template_part( 'template/parts/products/product', 'videos' );
			echo '</div><!-- #product-videos .tabcontent -->';
		endif;
		?>
	</div>
</section><!-- .product-tables-wrapper -->
