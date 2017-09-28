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




class galeriaMetabox {
	private $screens = array(
		'products',
	);
	private $fields = array(
		array(
			'label' => 'galeria',
			'id' => 'iddacena',
			'default' => 'dthfhfhfhf',
			'type' => 'media',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'admin_footer' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'galeria',
				__( 'GAleria', 'maqfort' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'side',
				'high'
			);
		}
	}
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'galeria_data', 'galeria_nonce' );
		echo 'Imagens aqui';
		$this->generate_fields( $post );
	}
	public function admin_footer() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.galeria-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('#'+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'galeria' . $field['id'], true );
			if ( empty( $db_value ) ) {
				$db_value = $field['default']; }
			switch ( $field['type'] ) {
				case 'media':
					$input = sprintf(
						'<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button galeria-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$field['id'],
						$field['id'],
						$db_value,
						$field['id'],
						$field['id']
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['galeria_nonce'] ) )
			return $post_id;
		$nonce = $_POST['galeria_nonce'];
		if ( !wp_verify_nonce( $nonce, 'galeria_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'galeria' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'galeria' . $field['id'], '0' );
			}
		}
	}
}
new galeriaMetabox;
