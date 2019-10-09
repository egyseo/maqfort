<?php

// Register Products Custom Post Type
function mf_produtos_cpt() {

	$labels = array(
		'name'                  => _x( 'Produtos', 'Post Type General Name', 'maqfort' ),
		'singular_name'         => _x( 'Produto', 'Post Type Singular Name', 'maqfort' ),
		'menu_name'             => __( 'Produtos', 'maqfort' ),
		'name_admin_bar'        => __( 'Produtos', 'maqfort' ),
		'archives'              => __( 'Arquivos de Produtos', 'maqfort' ),
		'attributes'            => __( 'Atributos de Produto', 'maqfort' ),
		'parent_item_colon'     => __( 'Produto Pai:', 'maqfort' ),
		'all_items'             => __( 'Todos os Produtos', 'maqfort' ),
		'add_new_item'          => __( 'Adicionar Novo Produto', 'maqfort' ),
		'add_new'               => __( 'Adicionar Novo', 'maqfort' ),
		'new_item'              => __( 'Novo Produto', 'maqfort' ),
		'edit_item'             => __( 'Editar Produto', 'maqfort' ),
		'update_item'           => __( 'Actualizar Produto', 'maqfort' ),
		'view_item'             => __( 'Ver Produto', 'maqfort' ),
		'view_items'            => __( 'Ver Produtos', 'maqfort' ),
		'search_items'          => __( 'Procurar Produto', 'maqfort' ),
		'not_found'             => __( 'Não encontrado', 'maqfort' ),
		'not_found_in_trash'    => __( 'Nenhum produto encontrado no lixo', 'maqfort' ),
		'featured_image'        => __( 'Imagem de destaque', 'maqfort' ),
		'set_featured_image'    => __( 'Definir imagem de destaque', 'maqfort' ),
		'remove_featured_image' => __( 'Remover imagem de destaque', 'maqfort' ),
		'use_featured_image'    => __( 'Usar como imagem de destaque', 'maqfort' ),
		'insert_into_item'      => __( 'Inserir em Produtos', 'maqfort' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'maqfort' ),
		'items_list'            => __( 'Lista de Produtos', 'maqfort' ),
		'items_list_navigation' => __( 'Navegação de lista de Produtos', 'maqfort' ),
		'filter_items_list'     => __( 'Filtrar lista de Produtos', 'maqfort' ),
	);

	$args = array(
		'label'                 => __( 'Produtos', 'maqfort' ),
		'description'           => __( 'Catálogo de Produtos', 'maqfort' ),
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
		'rewrite'               => array( 'slug' =>  _x('produtos', 'maqfort')),
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'produtos', $args );

}
add_action( 'init', 'mf_produtos_cpt', 0 );

// Register custom taxonomy for Products Custom Cost Cype.
/*function mf_product_cat_tax() {

  $permalinks = mf_get_permalink_structure();
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
add_action( 'init', 'mf_product_cat_tax', 0 );*/

// Plugin Activation
function mf_activation() {
    // trigger our function that registers the custom post type
    mf_produtos_cpt();

    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
add_action( 'after_setup_theme', 'mf_activation' );
