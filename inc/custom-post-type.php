<?php
/*
 * -----------------------------------------------------------
 * Register Custom Post Types and Taxonomies for the Theme.
 * -----------------------------------------------------------
 */

/*----------- Register Custom Taxonomie like product_cat -----------*/
function mf_register_custom_tax(){

  $labels = array(
    'name' =>  __( 'Categorias de Produtos', 'maqfort' ),
    'singular_name' => __('Categoria de Produto', 'maqfort'),
    'menu_name' => __('Categorias de Produtos', 'maqfort'),
    'all_items' => __('Todas as Categorias', 'maqfort'),
    'edit_item' => __('Editar Categoria', 'maqfort'),
    'view_item' => __('Ver Categoria', 'maqfort'),
    'update_item' =>  __('Actualizar Categoria', 'maqfort'),
    'add_new_item' => __('Adicionar Nova Categoria', 'maqfort'),
    'new_item_name' => __('Novo Nome de Categoria', 'maqfort'),
    'parent_item' => __('Categoria Pai', 'maqfort'),
    'parent_item_colon' => __('Categoria Pai:', 'maqfort'),
    'search_items' => __('Procurar Categorias', 'maqfort'),
    'popular_items' =>  __('Categorias Populares', 'maqfort'),
    'separate_items_with_commas' => __('Separate tags with commas', 'maqfort'),
    'add_or_remove_items' => __('Adicionar ou Renover Categorias', 'maqfort'),
    'choose_from_most_used' => __('Escolha das Categortias mais usadas', 'maqfort'),
    'not_found' =>  __( 'Nenhuma Categoria encontrada', 'maqfort'),
    'back_to_items' => __( '← Voltar às Categorias', 'maqfort'),
  );

  $args = array (
    'label' => __('Categorias de Produtos', 'maqfort'),
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' =>  true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'description' => __('', 'maqfort'),
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array(
      'slug' => __('produtos', 'maqfort'),
      'with_front' => false,
      'hierarchical' => true,
    ),
    'sort' => true,
  );

  register_taxonomy( 'mf_tipos_de_produtos', array('mf_produtos'), $args );

}

add_action( 'init', 'mf_register_custom_tax', 0 );


/*----------- Register Custom Post Type like product -----------*/
function mf_register_custom_post_type_products() {

	$labels = array(
		'name'                  => __( 'Produtos', 'Post Type General Name', 'maqfort' ),
		'singular_name'         => __( 'Produto', 'Post Type Singular Name', 'maqfort' ),
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
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    'taxonomies'            => array( 'mf_tipos_de_produtos' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
    'menu_icon' => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
    'has_archive' => 'todos_produtos',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
    'query_var' => true,
		'rewrite'               => array(
      'slug' =>  __('produtos/%mf_tipos_de_produtos%', 'maqfort'),
      'with_front' => false,
    ),
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'mf_produtos', $args );

}
add_action( 'init', 'mf_register_custom_post_type_products', 0 );

/*----------- Refresh rewrite rules on theme activation -----------*/
function mf_activation() {
    // trigger our function that registers the custom post type
    mf_register_custom_tax();
    mf_register_custom_post_type_products();
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
add_action( 'after_setup_theme', 'mf_activation' );




add_filter('post_type_link', 'projectcategory_permalink_structure', 10, 4);
function projectcategory_permalink_structure($post_link, $post, $leavename, $sample) {
    if (false !== strpos($post_link, '%mf_tipos_de_produtos%')) {
        $projectscategory_type_term = get_the_terms($post->ID, 'mf_tipos_de_produtos');
        if (!empty($projectscategory_type_term))
            $post_link = str_replace('%mf_tipos_de_produtos%', array_pop($projectscategory_type_term)->
            slug, $post_link);
        else
            $post_link = str_replace('%mf_tipos_de_produtos%', 'uncategorized', $post_link);
    }
    return $post_link;
}
