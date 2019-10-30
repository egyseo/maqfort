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

	foreach ( $table_list as $table ) :
		$table_head   = get_post_meta( $table, 'mf_tables_mb_table_head', true );
		$table_row    = get_post_meta( $table, 'mf_tables_mb_table_row', true );
		$table_name   = get_post_meta( $table, 'mf_tables_mb_table_name', true );
		$table_footer = get_post_meta( $table, 'mf_tables_mb_table_footer', true );

		?>
	<div id="<?php echo esc_html( $table_name ); ?>-tab" class="tabcontent">
		<div class="row">
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
						echo '</tr>';
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		<?php
		if ( $table_footer ) :
			echo '<div class="row">' , wpautop( $table_footer ) , '</div>';
		endif;
		?>
	</div>
		<?php

	endforeach;

	echo '</div></section>';

endif;
