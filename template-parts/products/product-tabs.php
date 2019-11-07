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

<section id="product-tabs-wrapper">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<ul class="tabs">
				<?php
				$count_tabs = 0;
				if ( $product_full_description ) :
					$count_tabs++;
					echo '<li rel="tab' , esc_attr( $count_tabs ) , '" >' , esc_html__( 'Informações do Produto', 'maqfort' ) , '</li>';
				endif;
				if ( $table_list ) :
					foreach ( $table_list as $table ) :
						$count_tabs++;
						$table_name = get_post_meta( $table, 'mf_tables_mb_table_name', true );
						echo '<li rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html( $table_name ) , '</li>';
					endforeach;
				endif;
				if ( $product_videos ) :
					$count_tabs++;
					echo '<li rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html__( 'Videos', 'maqfort' ) , '</li>';
				endif;
				?>
			</ul><!-- .tabs -->
			</div>
		</div>
	</div>
	<div class="tab-wrapper">
		<?php
		$count_tabs = 0;
		if ( $product_full_description ) :
			$count_tabs++;
			echo '<h3 class="d-active tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html__( 'Descrição', 'maqfort' ) , '</h3>';
			echo '<div id="tab' , esc_attr( $count_tabs ) , '" class="tab-content">';
			get_template_part( 'template-parts/products/product', 'description' );
			echo '</div><!-- .tab-content -->';
		endif;
		if ( $table_list ) :
			foreach ( $table_list as $table ) :
				$count_tabs++;
				$table_name = get_post_meta( $table, 'mf_tables_mb_table_name', true );
				echo '<h3 class="tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html( $table_name ) , '</h3>';
				get_template_part( 'template-parts/products/product', 'tables' );
			endforeach;

		endif;
		if ( $product_videos ) :
			$count_tabs++;
			echo '<h3 class="tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html__( 'Videos', 'maqfort' ) , '</h3>';
			echo '<div id="tab' , esc_attr( $count_tabs ) , '" class="tab-content">';
			get_template_part( 'template-parts/products/product', 'videos' );
			echo '</div><!-- .tab-content -->';
		endif;
		?>
	</div><!-- .tab-wrapper -->
</section>
