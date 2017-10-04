<?php
/*
* -----------------------------------------------------------
* 1.0 Get the main files.
* -----------------------------------------------------------
*/
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/*
* -----------------------------------------------------------
* 2.0 Get the extra functions files
* -----------------------------------------------------------
*/
require_once ( get_template_directory() . '/inc/components/cmb2-field-post-search-ajax-master/cmb-field-post-search-ajax.php' );

/*
* -----------------------------------------------------------
* 3.0 Creat metabox for products.
* -----------------------------------------------------------
*/
if ( ! function_exists('maqfort_products') ) {

  function maqfort_products() {

  	$prefix = '_maqfort_products_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => 'product_details',
  			'title'         => __( 'Detalhes do Produto', 'maqfort' ),
  			'object_types'  => array( 'products', ), // Post type
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
    	'name' => __( 'Mostrar na página inicial?', 'maqfort' ),
    	'desc' => __( 'Clique na caixa se desejar mosrtar este produtoo na página inicial', 'maqfort' ),
    	'id'   => $prefix . 'frontpage_checkbox',
    	'type' => 'checkbox',
    ) );

  	// Product Featured Images
  	$cmb->add_field( array(
  	    'name' => __( 'Imagens em destaque do Produto', 'maqfort' ),
  	    'desc' => __( 'Insira aqui as imagens em destaque do produto', 'maqfort' ),
  	    'id'   => $prefix . 'featured_imgs',
  	    'type' => 'file_list',
  	    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  	    // Optional, override default text strings
  	    'text' => array(
  	        'add_upload_files_text' => __( 'Adicionar/Subir Ficheiros', 'maqfort' ), // default: "Add or Upload Files"
  	        'remove_image_text' => __( 'Remover Imagem', 'maqfort' ), // default: "Remove Image"
  	        'file_text' => __( 'Ficheiros', 'maqfort' ), // default: "File:"
  	        'file_download_text' => __( 'Substituir', 'maqfort' ), // default: "Download"
  	        'remove_text' => __( 'Remover', 'maqfort' ), // default: "Remove"
  	    ),
  	) );

  	// Product Galleries
  	$cmb->add_field( array(
  			'name' => __( 'Galeria de Imagens do Produto', 'maqfort' ),
  			'desc' => __( 'Insira aqui a galeria de imagens do produto', 'maqfort' ),
  			'id'   => $prefix . 'gallerie',
  			'type' => 'file_list',
  			// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  			// Optional, override default text strings
  			'text' => array(
  					'add_upload_files_text' => __( 'Adicionar/Subir Ficheiros', 'maqfort' ), // default: "Add or Upload Files"
  					'remove_image_text' => __( 'Remover Imagem', 'maqfort' ), // default: "Remove Image"
  					'file_text' => __( 'Ficheiros', 'maqfort' ), // default: "File:"
  					'file_download_text' => __( 'Download', 'maqfort' ), // default: "Download"
  					'remove_text' => __( 'Remover', 'maqfort' ) // default: "Remove"
  			),
  	) );

  	// Product Catalog link/file
  	$cmb->add_field( array(
  	    'name'    => __( 'Catálogo do Produto', 'maqfort' ),
  	    'desc'    => __( 'Faça upload de uma imagem/pdf ou insira uma URL.', 'maqfort' ),
  	    'id'      => $prefix  .'catalog',
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

    // Contact form shortcode
    $cmb->add_field( array(
      'name' => __( 'Shortcode para o Formuláro de Orçamento', 'maqfort' ),
      'desc' => __( 'Insira aqui o shortcode do formulário para pedidos de orçamentos', 'maqfort' ),
      'default' => '',
      'id' => $prefix . 'quote_url',
      'type' => 'text_url'
    ) );


    $group_field_id = $cmb->add_field( array(
    	'id'          => $prefix . 'video_galerie',
    	'type'        => 'group',
    	'description' => __( 'Galeria de videos do Produto', 'maqfort' ),
    	// 'repeatable'  => false, // use false if you want non-repeatable group
    	'options'     => array(
    		'group_title'   => __( 'Video {#}', 'maqfort' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Adicionar Video', 'maqfort' ),
    		'remove_button' => __( 'Remover Video', 'maqfort' ),
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
        'description' => __( 'Insira aqui o thumbnail do video.', 'maqfort' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
    ) );
  }

  add_action( 'cmb2_init', 'maqfort_products' );

}



/*
* -----------------------------------------------------------
* 4.0 Creat metabox for related posts/products.
* -----------------------------------------------------------
*/

if ( ! function_exists('maqfort_related_posts') ) {

  function maqfort_related_posts() {

  	$prefix = '_maqfort_related_posts_';

  	$cmb = new_cmb2_box( array(
  		'id'           => $prefix . 'search_post',
  		'title'        => __( 'Related Content', 'amob' ),
  		'object_types' => array( 'products' ), // Post type
  		'context'      => 'normal',
  		'priority'     => 'high',
  		'show_names'   => true, // Show field names on the left
  	) );

  	$cmb->add_field( array(
  		'name'      	=> __( 'Related Products', 'maqfort' ),
  		'id'        	=> $prefix . 'search_products',
  		'type'      	=> 'post_search_ajax',
  		'desc'			=> __( '(Procure posts/produtos relacionados.)', 'maqfort' ),
  		// Optional :
  		'limit'      	=> 3, 		// Limit selection to X items only (default 1)
  		'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
  		'query_args'	=> array(
  			'post_type'			=> array( 'products' ),
  			'post_status'		=> array( 'publish' ),
  			'posts_per_page'	=> -1
  		)
  	) );

  }

  add_action( 'cmb2_init', 'maqfort_related_posts' );

}