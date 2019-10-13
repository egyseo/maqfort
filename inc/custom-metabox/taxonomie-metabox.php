<?php

add_action( 'cmb2_admin_init', 'maqfort_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function maqfort_taxonomy_metabox() {
 $prefix = 'customtaxonomie_mb_';

 /**
  * Metabox to add fields to categories and tags
  */
 $cmb_term = new_cmb2_box( array(
   'id'               => $prefix . 'edit',
   'title'            => esc_html__( 'Categoria de Produtos', 'maqfort' ), // Doesn't output for term boxes
   'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
   'taxonomies'       => array( 'categorias_de_produtos' ), // Tells CMB2 which taxonomies should have these fields
   // 'new_term_section' => true, // Will display in the "Add New Category" section
 ) );

 $cmb_term->add_field( array(
   'name' => esc_html__( 'Imagem da categoria', 'maqfort' ),
   'id'   => $prefix . 'image',
   'type' => 'file',
   'column' => array(
     'position' => 3,
     'name'     => esc_html__('Imagem', 'maqfort'),
   ),
 ) );

}
