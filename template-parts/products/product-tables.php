<?php
/**
 * -----------------------------------------------------------
 * Tables with extra info for products.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$table_list = get_post_meta( get_the_ID(), '_mf_produtos_tabelas', true );

if ( $table_list ) :

	$count_tabs = 1;

	foreach ( $table_list as $table ) :
		$table_head   = get_post_meta( $table, 'mf_tables_mb_table_head', true );
		$table_row    = get_post_meta( $table, 'mf_tables_mb_table_row', true );
		$table_name   = get_post_meta( $table, 'mf_tables_mb_table_name', true );
		$table_footer = get_post_meta( $table, 'mf_tables_mb_table_footer', true );
		$count_tabs++;
		echo '<h3 class="tab-drawer-heading" rel="tab' , esc_attr( $count_tabs ) , '">' , esc_html( $table_name ) , '</h3>';

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
								</thead>
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
								</tbody>
							</table><!-- table -->
							<?php
							if ( $table_footer ) :
								echo '<div class="table-footer">' , wp_kses_post( wpautop( $table_footer ) ) , '</div><!-- .table-footer -->';
							endif;
							?>
						</div>
					</div>
				</div><!-- .container -->
			</section><!-- .product-table -->
		</div><!-- .tabcontent -->
		<?php

	endforeach;

endif;
