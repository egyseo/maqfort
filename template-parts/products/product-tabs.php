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
						echo '<li class="active" rel="tab' , esc_attr( $count_tabs ) , '" ><h3>' , esc_html__( 'Informações do Produto', 'maqfort' ) , '</h3></li>';
					endif;
					if ( $table_list ) :
						foreach ( $table_list as $table ) :
							$count_tabs++;
							$table_name = get_post_meta( $table, 'mf_tables_mb_table_name', true );
							echo '<li rel="tab' , esc_attr( $count_tabs ) , '"><h3>' , esc_html( $table_name ) , '</h3></li>';
						endforeach;
					endif;
					if ( $product_videos ) :
						$count_tabs++;
						echo '<li rel="tab' , esc_attr( $count_tabs ) , '"><h3>' , esc_html__( 'Videos', 'maqfort' ) , '</h3></li>';
					endif;
					?>
				</ul><!-- .tabs -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
	<div class="tab-wrapper">
		<?php
		$count_tabs = 0;
		if ( $product_full_description ) :
			$count_tabs++;
			echo '<div class="tab-header-mobile d-active tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '"><div class="container container-fluid"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><h3>' , esc_html__( 'Descrição', 'maqfort' ) , '</h3></div></div></div></div>';
			echo '<div id="tab' , esc_attr( $count_tabs ) , '" class="tab-content">';
			get_template_part( 'template-parts/products/product', 'description' );
			echo '</div><!-- .tab-content -->';
		endif;
		if ( $table_list ) :
			foreach ( $table_list as $table ) :
				$count_tabs++;
				$table_head   = get_post_meta( $table, 'mf_tables_mb_table_head', true );
				$table_row    = get_post_meta( $table, 'mf_tables_mb_table_row', true );
				$table_name   = get_post_meta( $table, 'mf_tables_mb_table_name', true );
				$table_footer = get_post_meta( $table, 'mf_tables_mb_table_footer', true );
				echo '<div class="tab-header-mobile tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '"><div class="container container-fluid"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><h3>' , esc_html( $table_name ) , '</h3></div></div></div></div>';
				?>
				<div id="tab<?php echo esc_attr( $count_tabs ); ?>" class="tab-content">
					<section class="product-table">
						<div class="container container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<table>
										<thead>
											<?php
											foreach ( (array) $table_head as $thead ) :
												echo '<td><p>', esc_html( $thead ) ,'</p></td>';
											endforeach;
											?>
										</thead><!-- thead -->
										<tbody>
											<?php
											foreach ( (array) $table_row as $trow => $row ) :
												echo '<tr>';
												$tcell = '';
												if ( isset( $row['table_cell'] ) ) :
													$tcell = $row['table_cell'];
													foreach ( $tcell as $cell ) :
														echo '<td><p>', esc_html( $cell ) ,'</p></td>';
												endforeach;
												endif;
												echo '</tr><!-- tr -->';
											endforeach;
											?>
										</tbody><!-- tbody -->
									</table><!-- table -->
									<?php
									if ( $table_footer ) :
										echo '<div class="table-footer">' , wp_kses_post( wpautop( $table_footer ) ) , '</div><!-- .table-footer -->';
									endif;
									?>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .container -->
					</section><!-- .product-table -->
				</div><!-- .tabcontent -->
				<?php
			endforeach;

		endif;
		if ( $product_videos ) :
			$count_tabs++;
			echo '<div class="tab-header-mobile tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '"><div class="container container-fluid"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><h3>' , esc_html__( 'Videos', 'maqfort' ) , '</h3></div></div></div></div>';
			echo '<div id="tab' , esc_attr( $count_tabs ) , '" class="tab-content">';
			get_template_part( 'template-parts/products/product', 'videos' );
			echo '</div><!-- .tab-content -->';
		endif;
		?>
	</div><!-- .tab-wrapper -->
</section><!-- #product-tabs-wrapper -->
