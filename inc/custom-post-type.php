<?php

// Get permalink settings for MAQFORT independent of the user locale.
function maqfort_get_permalink_structure() {

	// Ensure rewrite slugs are set.
	$permalinks['product_rewrite_slug']   = untrailingslashit( empty( $permalinks['product_base'] ) ? _x( 'products', 'slug', 'maqfort' ) : $permalinks['product_base'] );
	//$permalinks['category_rewrite_slug']  = untrailingslashit( empty( $permalinks['category_base'] ) ? _x( 'product-category', 'slug', 'maqfort' ) : $permalinks['category_base'] );

	return $permalinks;
}

// Register Products Custom Post Type
function maqfort_products_cpt() {

  $permalinks = maqfort_get_permalink_structure();

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'maqfort' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'maqfort' ),
		'menu_name'             => __( 'Products', 'maqfort' ),
		'name_admin_bar'        => __( 'Products', 'maqfort' ),
		'archives'              => __( 'Product Archives', 'maqfort' ),
		'attributes'            => __( 'Product Attributes', 'maqfort' ),
		'parent_item_colon'     => __( 'Parent Product:', 'maqfort' ),
		'all_items'             => __( 'All Products', 'maqfort' ),
		'add_new_item'          => __( 'Add New Product', 'maqfort' ),
		'add_new'               => __( 'Add New', 'maqfort' ),
		'new_item'              => __( 'New Product', 'maqfort' ),
		'edit_item'             => __( 'Edit Item', 'maqfort' ),
		'update_item'           => __( 'Update Product', 'maqfort' ),
		'view_item'             => __( 'View Product', 'maqfort' ),
		'view_items'            => __( 'View Products', 'maqfort' ),
		'search_items'          => __( 'Search Product', 'maqfort' ),
		'not_found'             => __( 'Not found', 'maqfort' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maqfort' ),
		'featured_image'        => __( 'Featured Image', 'maqfort' ),
		'set_featured_image'    => __( 'Set featured image', 'maqfort' ),
		'remove_featured_image' => __( 'Remove featured image', 'maqfort' ),
		'use_featured_image'    => __( 'Use as featured image', 'maqfort' ),
		'insert_into_item'      => __( 'Insert into Product', 'maqfort' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'maqfort' ),
		'items_list'            => __( 'Products list', 'maqfort' ),
		'items_list_navigation' => __( 'Products list navigation', 'maqfort' ),
		'filter_items_list'     => __( 'Filter Products list', 'maqfort' ),
	);

	$args = array(
		'label'                 => __( 'Products', 'maqfort' ),
		'description'           => __( 'Products Catalogue', 'maqfort' ),
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
		'has_archive'           => true,
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
/*function maqfort_product_cat_tax() {

  $permalinks = maqfort_get_permalink_structure();
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'maqfort' ),
		'singular_name'     => _x( 'Categorie', 'taxonomy singular name', 'maqfort' ),
		'search_items'      => __( 'Search Categories', 'maqfort' ),
		'all_items'         => __( 'All Categories', 'maqfort' ),
		'parent_item'       => __( 'Parent Categorie', 'maqfort' ),
		'parent_item_colon' => __( 'Parent Categorie:', 'maqfort' ),
		'edit_item'         => __( 'Edit Categorie', 'maqfort' ),
		'update_item'       => __( 'Update Categorie', 'maqfort' ),
		'add_new_item'      => __( 'Add New Categorie', 'maqfort' ),
		'new_item_name'     => __( 'New Categorie Name', 'maqfort' ),
		'menu_name'         => __( 'Categories', 'maqfort' ),
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
add_action( 'init', 'maqfort_product_cat_tax', 0 );*/

// Plugin Activation
function maqfort_activation() {
    // trigger our function that registers the custom post type
    maqfort_products_cpt();

    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
add_action( 'after_setup_theme', 'maqfort_activation' );
