<?php
/*
* -----------------------------------------------------------
* Metabox for products.
* -----------------------------------------------------------
*/
if ( ! function_exists('mf_produtos') ) {

  function mf_produtos() {

  	$prefix = '_mf_produtos_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => 'product_details',
  			'title'         => __( 'Detalhes do Produto', 'maqfort' ),
  			'object_types'  => array( 'mf_produtos' ), // Post type
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

  	// Product Images
  	$cmb->add_field( array(
  			'name' => __( 'Principais imagens do produtos', 'maqfort' ),
  			'desc' => '',
  			'id'   => $prefix . 'gallerie',
  			'type' => 'file_list',
  			// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  			// Optional, override default text strings
  			'text' => array(
  					'add_upload_files_text' => __( 'Adicionar Imagem', 'maqfort' ), // default: "Add or Upload Files"
  					'remove_image_text' => __( 'Remover Imager', 'maqfort' ), // default: "Remove Image"
  					'file_text' => __( 'Ficheiros', 'maqfort' ), // default: "File:"
  					'file_download_text' => __( 'Download', 'maqfort' ), // default: "Download"
  					'remove_text' => __( 'Remover', 'maqfort' ) // default: "Remove"
  			),
  	) );

    // Product Pieces Images
    $cmb->add_field( array(
        'name' => __( 'Imagens de detalhes do produto', 'maqfort' ),
        'desc' => '',
        'id'   => $prefix . 'carousel',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __( 'Adicionar Imagem', 'maqfort' ), // default: "Add or Upload Files"
            'remove_image_text' => __( 'Remover Imagem', 'maqfort' ), // default: "Remove Image"
            'file_text' => __( 'Ficheiros', 'maqfort' ), // default: "File:"
            'file_download_text' => __( 'Download', 'maqfort' ), // default: "Download"
            'remove_text' => __( 'Remover', 'maqfort' ) // default: "Remove"
        ),
    ) );

    // Product Catalog link/file
    $cmb->add_field( array(
        'name'    => __( 'Detalhes do Produto em PDF', 'maqfort' ),
        'desc'    => '',
        'id'      => $prefix  . 'extra_info',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Adicionar Ficheiro' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => 'application/pdf', // Make library only display PDFs.
        ),
    ) );

    $cmb->add_field( array(
      'name'        => __( 'Tabela de especificações do produto', 'maqfort' ),
      'id'          => $prefix . 'tabelas',
      'type'        => 'post_search_ajax',
      'desc'        => __( 'Procure por tabelas', 'maqfort' ),
      'limit'        => 4,
      'sortable'     => true,
      'query_args'   => array(
        'post_type'       => array('mf_tables'),
        'post_status'     => array('publish'),
        'posts_per_page'  => -1
        )
      ) );

    $group_field_id = $cmb->add_field( array(
    	'id'          => $prefix . 'video_galerie',
    	'type'        => 'group',
    	'description' => __( 'Product Video Gallery', 'maqfort' ),
    	// 'repeatable'  => false, // use false if you want non-repeatable group
    	'options'     => array(
    		'group_title'   => __( 'Video {#}', 'maqfort' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add Video', 'maqfort' ),
    		'remove_button' => __( 'Remove Video', 'maqfort' ),
    		'sortable'      => true, // beta
    		 'closed'     => true, // true to have the groups closed by default
    	),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
      'name' => 'oEmbed',
    	'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
    	'id'   => $prefix . 'embed',
    	'type' => 'oembed',
    	// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Video Thumbnail', 'maqfort' ),
        'description' => __( 'Insert here the video thumbnail.', 'maqfort' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
    ) );

  }

  add_action( 'cmb2_init', 'mf_produtos' );

}
