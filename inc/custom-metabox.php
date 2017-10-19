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
  			'title'         => __( 'Product Details', 'maqfort' ),
  			'object_types'  => array( 'products', ), // Post type
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

  	// Product Images
  	$cmb->add_field( array(
  			'name' => __( 'Product Images ', 'maqfort' ),
  			'desc' => __( 'Insert here the images of the product.', 'maqfort' ),
  			'id'   => $prefix . 'gallerie',
  			'type' => 'file_list',
  			// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  			// Optional, override default text strings
  			'text' => array(
  					'add_upload_files_text' => __( 'Add Image', 'maqfort' ), // default: "Add or Upload Files"
  					'remove_image_text' => __( 'Remove Image', 'maqfort' ), // default: "Remove Image"
  					'file_text' => __( 'Files', 'maqfort' ), // default: "File:"
  					'file_download_text' => __( 'Download', 'maqfort' ), // default: "Download"
  					'remove_text' => __( 'Remove', 'maqfort' ) // default: "Remove"
  			),
  	) );

    // Product Pieces Images
    $cmb->add_field( array(
        'name' => __( 'Product Pieces Image', 'maqfort' ),
        'desc' => __( 'Insert here the images of the product piece', 'maqfort' ),
        'id'   => $prefix . 'carousel',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __( 'Add Image', 'maqfort' ), // default: "Add or Upload Files"
            'remove_image_text' => __( 'Remove Image', 'maqfort' ), // default: "Remove Image"
            'file_text' => __( 'Files', 'maqfort' ), // default: "File:"
            'file_download_text' => __( 'Download', 'maqfort' ), // default: "Download"
            'remove_text' => __( 'Remove', 'maqfort' ) // default: "Remove"
        ),
    ) );

  	// Product Catalog link/file
  	$cmb->add_field( array(
  	    'name'    => __( 'Product Catalog', 'maqfort' ),
  	    'desc'    => __( 'Upload the pdf file or insert the URL.', 'maqfort' ),
  	    'id'      => $prefix  .'catalog',
  	    'type'    => 'file',
  	    // Optional:
  	    'options' => array(
  	        'url' => true, // Hide the text input for the url
  	    ),
  	    'text'    => array(
  	        'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
  	    ),
  	    // query_args are passed to wp.media's library query.
  	    'query_args' => array(
  	        'type' => 'application/pdf', // Make library only display PDFs.
  	    ),
  	) );

    // Contact form shortcode
    $cmb->add_field( array(
      'name' => __( 'Contact Form Shortcode', 'maqfort' ),
      'desc' => __( 'Insert here the shortcode of the disere contact form.', 'maqfort' ),
      'default' => '',
      'id' => $prefix . 'quote_url',
      'type' => 'text'
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
    'title'        => __( 'Related Content', 'maqfort' ),
    'object_types' => array( 'products' ), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
    'name'      	=> __( 'Related Products', 'maqfort' ),
    'id'        	=> $prefix . 'search_products',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( '(Search for related products)', 'maqfort' ),
    // Optional :
    'limit'      	=> 3, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
    	'post_type'			=> array( 'products' ),
    	'post_status'		=> array( 'publish' ),
    	'posts_per_page'	=> -1
    )
    ) );

    $cmb->add_field( array(
    'name'      	=> __( 'Related Posts', 'maqfort' ),
    'id'        	=> $prefix . 'search_posts',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( '(Search for related posts)', 'maqfort' ),
    // Optional :
    'limit'      	=> 3, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
      'post_type'			=> array( 'posts' ),
      'post_status'		=> array( 'publish' ),
      'posts_per_page'	=> -1
    )
    ) );

  }

  add_action( 'cmb2_init', 'maqfort_related_posts' );

}

/*
* -----------------------------------------------------------
* 5.0 Creat metabox for contacts page.
* -----------------------------------------------------------
*/
if ( ! function_exists('maqfort_address') ) {

  function maqfort_address() {

  	$prefix = '_maqfort_address_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => $prefix . 'details',
  			'title'         => __( 'MAQFORT Contacts', 'maqfort' ),
  			'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contacts.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
        'name' => __( 'Title', 'maqfort' ),
        'description' => __( '', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );
    // text area
    $cmb->add_field( array(
        'name' => __( 'Address', 'maqfort' ),
        'desc' => __( 'Insert address here.', 'maqfort' ),
        'default' => '',
        'id' => $prefix . 'address',
        'type' => 'textarea_small'
    ) );
    $cmb->add_field( array(
        'name' => __( 'Phone', 'maqfort' ),
        'description' => __( 'Insert the phone number here.', 'maqfort' ),
        'id'   => $prefix . 'phone',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Email', 'maqfort' ),
        'description' => __( 'Insert the phone number here.', 'maqfort' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
    ) );

  }

  add_action( 'cmb2_init', 'maqfort_address' );

}

//contact form metabox
if ( ! function_exists('maqfort_contact_form') ) {

  function maqfort_contact_form() {

  	$prefix = 'maqfort_contact_form_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => $prefix . 'details',
  			'title'         => __( 'Contact Form', 'maqfort' ),
  			'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contacts.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
        'name' => __( 'Title', 'maqfort' ),
        'description' => __( 'Form Title', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );

    // text area
    $cmb->add_field( array(
        'name' => __( 'Description', 'maqfort' ),
        'desc' => __( 'Description here', 'maqfort' ),
        'default' => '',
        'id' => $prefix . 'description',
        'type' => 'text'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Form Shortcode', 'maqfort' ),
        'description' => __( 'Insert here the form shortcode', 'maqfort' ),
        'id'   => $prefix . 'shortcode',
        'type' => 'text',
    ) );


  }

  add_action( 'cmb2_init', 'maqfort_contact_form' );

}

/*
* -----------------------------------------------------------
* 6.0 Creat metabox for maqfort srevices on home page.
* -----------------------------------------------------------
*/
if ( ! function_exists('maqfort_homepage_services') ) {

  function maqfort_homepage_services() {

  	$prefix = '_maqfort_homepage_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => $prefix . 'services',
  			'title'         => __( 'MAQFORT Services', 'maqfort' ),
  			'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );
    //start group field
    $group_field_id = $cmb->add_field( array(
      'id'          => $prefix . 'itens',
      'type'        => 'group',
      'description' => __( 'Add Services', 'maqfort' ),
      // 'repeatable'  => false, // use false if you want non-repeatable group
      'options'     => array(
          'group_title'   => __( 'Service {#}', 'maqfort' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Add Service', 'maqfort' ),
          'remove_button' => __( 'Remover Service', 'maqfort' ),
          'sortable'      => true, // beta
          'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Service title', 'maqfort' ),
        'description' => __( 'Insert here the service title.', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );


    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'URL', 'maqfort' ),
        'description' => __( 'Insert here the url.', 'maqfort' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Service image', 'maqfort' ),
        'description' => __( 'Insert here the desire image.', 'maqfort' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
    ) );

  }

  add_action( 'cmb2_init', 'maqfort_homepage_services' );

}

/*
* -----------------------------------------------------------
* 7.0 Creat metabox for products on the front page.
* -----------------------------------------------------------
*/
if ( ! function_exists('maqfort_products_list') ) {

  function maqfort_products_list() {

  	$prefix = '_maqfort_products_list_';

    $cmb = new_cmb2_box( array(
    'id'           => $prefix . 'search_product',
    'title'        => __( 'Product List', 'maqfort' ),
    'object_types'  => array( 'page', ), // Post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
    'name'      	=> __( 'Products', 'maqfort' ),
    'id'        	=> $prefix . 'product',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( '(Search for products)', 'maqfort' ),
    // Optional :
    'limit'      	=> 6, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
    	'post_type'			=> array( 'products' ),
    	'post_status'		=> array( 'publish' ),
    	'posts_per_page'	=> -1
      )
    ) );

  }

  add_action( 'cmb2_init', 'maqfort_products_list' );

}

/*
* -----------------------------------------------------------
* 8.0 Creat metabox for title links on the front page.
* -----------------------------------------------------------
*/
if ( ! function_exists('maqfort_title_links') ) {

  function maqfort_title_links() {

  	$prefix = '_maqfort_titles_';

    $cmb = new_cmb2_box( array(
    'id'           => $prefix . 'links',
    'title'        => __( 'Home Page Links', 'maqfort' ),
    'object_types'  => array( 'page', ), // Post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
    ) );

    $cmb->add_field(  array(
        'name' => __( 'Products URL', 'maqfort' ),
        'description' => __( 'Insert here the url.', 'maqfort' ),
        'id'   => $prefix . 'products_url',
        'type' => 'text_url',
    ) );

    $cmb->add_field(  array(
        'name' => __( 'New URL', 'maqfort' ),
        'description' => __( 'Insert here the url.', 'maqfort' ),
        'id'   => $prefix . 'news_url',
        'type' => 'text_url',
    ) );

  }

  add_action( 'cmb2_init', 'maqfort_title_links' );

}
