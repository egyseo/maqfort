<?php
/*
* -----------------------------------------------------------
* Metabox for related posts/products.
* -----------------------------------------------------------
*/
if ( ! function_exists('mf_related_posts') ) {

  function mf_related_posts() {

    $prefix = '_mf_related_posts_';

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
    'id'        	=> $prefix . 'search_news',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( '(Search for related posts)', 'maqfort' ),
    // Optional :
    'limit'      	=> 3, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
      'post_type'			=> array( 'post' ),
      'post_status'		=> array( 'publish' ),
      'posts_per_page'	=> -1
    )
    ) );

  }

  add_action( 'cmb2_init', 'mf_related_posts' );

}
