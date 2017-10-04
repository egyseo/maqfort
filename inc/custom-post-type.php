<?php

// Get permalink settings for MAQFORT independent of the user locale.
function maqfort_get_permalink_structure() {

	// Ensure rewrite slugs are set.
	$permalinks['product_rewrite_slug']   = untrailingslashit( empty( $permalinks['product_base'] ) ? _x( 'products', 'slug', 'mfpc' ) : $permalinks['product_base'] );
	$permalinks['category_rewrite_slug']  = untrailingslashit( empty( $permalinks['category_base'] ) ? _x( 'product-category', 'slug', 'mfpc' ) : $permalinks['category_base'] );

	return $permalinks;
}

// Register Products Custom Post Type
function maqfort_products_cpt() {

  $permalinks = maqfort_get_permalink_structure();

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'mfpc' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'mfpc' ),
		'menu_name'             => __( 'Products', 'mfpc' ),
		'name_admin_bar'        => __( 'Products', 'mfpc' ),
		'archives'              => __( 'Product Archives', 'mfpc' ),
		'attributes'            => __( 'Product Attributes', 'mfpc' ),
		'parent_item_colon'     => __( 'Parent Product:', 'mfpc' ),
		'all_items'             => __( 'All Products', 'mfpc' ),
		'add_new_item'          => __( 'Add New Product', 'mfpc' ),
		'add_new'               => __( 'Add New', 'mfpc' ),
		'new_item'              => __( 'New Product', 'mfpc' ),
		'edit_item'             => __( 'Edit Item', 'mfpc' ),
		'update_item'           => __( 'Update Product', 'mfpc' ),
		'view_item'             => __( 'View Product', 'mfpc' ),
		'view_items'            => __( 'View Products', 'mfpc' ),
		'search_items'          => __( 'Search Product', 'mfpc' ),
		'not_found'             => __( 'Not found', 'mfpc' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mfpc' ),
		'featured_image'        => __( 'Featured Image', 'mfpc' ),
		'set_featured_image'    => __( 'Set featured image', 'mfpc' ),
		'remove_featured_image' => __( 'Remove featured image', 'mfpc' ),
		'use_featured_image'    => __( 'Use as featured image', 'mfpc' ),
		'insert_into_item'      => __( 'Insert into Product', 'mfpc' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'mfpc' ),
		'items_list'            => __( 'Products list', 'mfpc' ),
		'items_list_navigation' => __( 'Products list navigation', 'mfpc' ),
		'filter_items_list'     => __( 'Filter Products list', 'mfpc' ),
	);

	$args = array(
		'label'                 => __( 'Produtos', 'mfpc' ),
		'description'           => __( 'Products Cataloguw', 'mfpc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon' => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'products',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $permalinks['product_rewrite_slug'] ? array( 'slug' => $permalinks['product_rewrite_slug'], 'with_front' => false, 'feeds' => true ) : false,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'products', $args );

}
add_action( 'init', 'maqfort_products_cpt', 0 );

// Register custom taxonomy for Products Custom Cost Cype.
function maqfort_product_cat_tax() {

  $permalinks = maqfort_get_permalink_structure();
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'mfpc' ),
		'singular_name'     => _x( 'Categorie', 'taxonomy singular name', 'mfpc' ),
		'search_items'      => __( 'Search Categories', 'mfpc' ),
		'all_items'         => __( 'All Categories', 'mfpc' ),
		'parent_item'       => __( 'Parent Categorie', 'mfpc' ),
		'parent_item_colon' => __( 'Parent Categorie:', 'mfpc' ),
		'edit_item'         => __( 'Edit Categorie', 'mfpc' ),
		'update_item'       => __( 'Update Categorie', 'mfpc' ),
		'add_new_item'      => __( 'Add New Categorie', 'mfpc' ),
		'new_item_name'     => __( 'New Categorie Name', 'mfpc' ),
		'menu_name'         => __( 'Categories', 'mfpc' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    'rewrite'          => array(
      'slug'         => $permalinks['category_rewrite_slug'],
      'with_front'   => false,
      'hierarchical' => true,
    ),
	);

	register_taxonomy( 'product-category', array( 'products' ), $args );

}
add_action( 'init', 'maqfort_product_cat_tax', 0 );

// Plugin Activation
function maqfort_activation() {
    // trigger our function that registers the custom post type
    maqfort_products_cpt();

    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
add_action( 'after_setup_theme', 'maqfort_activation' );
