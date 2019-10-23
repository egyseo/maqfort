<?php
/*
 * -----------------------------------------------------------
 * Add metabox to creat tables
 * -----------------------------------------------------------
 */

if (!function_exists('mf_tables_mb')) :

  function mf_tables_mb() {

    $prefix = 'mf_tables_mb_';

    $cmb = new_cmb2_box( array(
      'id'            => $prefix . 'table',
      'title'         => __( 'Tabela', 'maqfort' ),
      'object_types'  => array( 'mf_tables' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $cmb->add_field(array(
      'name' => __( 'Nome da tabela', 'maqfort' ),
      'desc' => '',
      'id'   => $prefix . 'table_name',
      'type' => 'text',
    ) );

    $cmb->add_field(array(
      'name' => __( 'Cabeçalho da Tabela', 'maqfort' ),
      'desc' => '',
      'id'   => $prefix . 'table_head',
      'type' => 'text',
      'repeatable' => true,
    ) );

    $group_field_id = $cmb->add_field( array(
      'id'          => $prefix . 'table_row',
      'type'        => 'group',
      'description' => '',
      'options'     => array(
        'group_title'   => __('Linha {#}', 'maqfort'),
        'add_button'    => __('Adicionar Linha', 'maqfort'),
        'remove_button' => __('Remover Linha', 'maqfort'),
        'sortable'      => true,
        'closed'        => true,
    ) ) );

    $cmb->add_group_field( $group_field_id, array(
      'id'   => 'table_cell',
      'type' => 'text',
      'name' => __('Conteudo', 'maqfort'),
      'desc' => '',
      'repeatable' => true,
    ) );

  }

  add_action( 'cmb2_init', 'mf_tables_mb' );

endif;
