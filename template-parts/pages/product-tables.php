<?php
/*
 * -----------------------------------------------------------
 * Tables with extra info for products.
 * -----------------------------------------------------------
 */

global $post;

$tableList = get_post_meta(get_the_ID(), '_mf_produtos_tabelas', true);

if($tableList) :

  echo '<section class="product-tables-wrapper"><div class="container container-fluid"><div class="tab">';

  foreach ($tableList as $table) : setup_postdata( $GLOBALS['post'] =& $post );
    $tableName = get_the_title($table);
    ?><button class="tablinks" onclick="mfNextTable(event, '<?php echo $tableName; ?>')"><h3><?php echo $tableName; ?></h3></button><?php
  endforeach;

  echo '</div>';

  foreach ($tableList as $table) : setup_postdata( $GLOBALS['post'] =& $post );
    $tableHead = get_post_meta($table, 'mf_tables_mbtable_head', true);
    $tableRow = get_post_meta($table, 'mf_tables_mbtable_row', true);
    $tableName = get_the_title($table);

    ?>
    <div id="<?php echo $tableName; ?>" class="tabcontent">
      <table>
        <thead>
          <?php
          foreach ((array)$tableHead as $thead) :
            echo '<td><p>', esc_html($thead) ,'</p></td>';
          endforeach;
          ?>
        </thead>
        <tbody>
          <?php
          foreach ((array)$tableRow as $trow => $row) :
            echo '<tr>';
            $tcell = '';

            if (isset($row['table_cell'])) :
              $tcell = $row['table_cell'];
              foreach ($tcell as $cell) :
                echo '<td><p>', esc_html($cell) ,'</p></td>';
              endforeach;
            endif;
            echo '</tr>';
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
    <?php

  endforeach;

  echo '</div></section>';

endif;

wp_reset_postdata();
