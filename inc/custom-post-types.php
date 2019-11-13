<?php
/*
 * -----------------------------------------------------------
 * Register Custom Post Types and Taxonomies for the Theme.
 * -----------------------------------------------------------
 */

/*----------- Register Custom Taxonomie like product_cat -----------*/
add_action( 'init', 'mf_register_custom_tax', 0 );

function mf_register_custom_tax() {

	$labels = array(
		'name'                       => __( 'Categorias de Produtos', 'maqfort' ),
		'singular_name'              => __( 'Categoria de Produto', 'maqfort' ),
		'menu_name'                  => __( 'Categorias de Produtos', 'maqfort' ),
		'all_items'                  => __( 'Todas as Categorias', 'maqfort' ),
		'edit_item'                  => __( 'Editar Categoria', 'maqfort' ),
		'view_item'                  => __( 'Ver Categoria', 'maqfort' ),
		'update_item'                => __( 'Actualizar Categoria', 'maqfort' ),
		'add_new_item'               => __( 'Adicionar Nova Categoria', 'maqfort' ),
		'new_item_name'              => __( 'Novo Nome de Categoria', 'maqfort' ),
		'parent_item'                => __( 'Categoria Pai', 'maqfort' ),
		'parent_item_colon'          => __( 'Categoria Pai:', 'maqfort' ),
		'search_items'               => __( 'Procurar Categorias', 'maqfort' ),
		'popular_items'              => __( 'Categorias Populares', 'maqfort' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'maqfort' ),
		'add_or_remove_items'        => __( 'Adicionar ou Renover Categorias', 'maqfort' ),
		'choose_from_most_used'      => __( 'Escolha das Categortias mais usadas', 'maqfort' ),
		'not_found'                  => __( 'Nenhuma Categoria encontrada', 'maqfort' ),
		'back_to_items'              => __( '← Voltar às Categorias', 'maqfort' ),
	);

	$args = array(
		'label'              => __( 'Categorias de Produtos', 'maqfort' ),
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'show_admin_column'  => true,
		'description'        => __( '', 'maqfort' ),
		'hierarchical'       => true,
		'query_var'          => true,
		'sort'               => true,
		'rewrite'            => array(
			'slug' => __( 'tipos_de_produtos', 'maqfort' ),
			'with_front' => false,
		),
	);

	register_taxonomy( 'mf_tipos_de_produtos', array( 'mf_produtos' ), $args );

}

/*----------- Register Custom Post Type like product -----------*/
add_action( 'init', 'mf_register_custom_post_type_products', 0 );

function mf_register_custom_post_type_products() {

	$labels = array(
		'name'                  => __( 'Produtos', 'maqfort' ),
		'singular_name'         => __( 'Produto', 'maqfort' ),
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
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array(
			'slug' => __( 'produtos', 'maqfort' ),
			'with_front' => false,
		),
	);

	register_post_type( 'mf_produtos', $args );

}

/*----------- Subsection comment block -----------*/
add_action( 'init', 'mf_register_custom_post_type_tables', 0 );

function mf_register_custom_post_type_tables() {

	$labels = array(
		'name'                  => __( 'Tabelas', 'maqfort' ),
		'singular_name'         => __( 'Tabela', 'maqfort' ),
		'menu_name'             => __( 'Tabelas', 'maqfort' ),
		'name_admin_bar'        => __( 'Tabelas', 'maqfort' ),
		'archives'              => __( 'Arquivos de Tabelas', 'maqfort' ),
		'attributes'            => __( 'Atributos de Tabela', 'maqfort' ),
		'parent_item_colon'     => __( 'Tabela Pai:', 'maqfort' ),
		'all_items'             => __( 'Todas as Tabelas', 'maqfort' ),
		'add_new_item'          => __( 'Adicionar Nova Tabela', 'maqfort' ),
		'add_new'               => __( 'Adicionar Nova', 'maqfort' ),
		'new_item'              => __( 'Nova Tabela', 'maqfort' ),
		'edit_item'             => __( 'Editar Tabela', 'maqfort' ),
		'update_item'           => __( 'Actualizar Tabela', 'maqfort' ),
		'view_item'             => __( 'Ver Tabela', 'maqfort' ),
		'view_items'            => __( 'Ver Tabelas', 'maqfort' ),
		'search_items'          => __( 'Procurar Tabela', 'maqfort' ),
		'not_found'             => __( 'Não encontrado', 'maqfort' ),
		'not_found_in_trash'    => __( 'Nenhum Tabela encontrado no lixo', 'maqfort' ),
		'featured_image'        => __( 'Imagem de destaque', 'maqfort' ),
		'set_featured_image'    => __( 'Definir imagem de destaque', 'maqfort' ),
		'remove_featured_image' => __( 'Remover imagem de destaque', 'maqfort' ),
		'use_featured_image'    => __( 'Usar como imagem de destaque', 'maqfort' ),
		'insert_into_item'      => __( 'Inserir em Tabelas', 'maqfort' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'maqfort' ),
		'items_list'            => __( 'Lista de Tabelas', 'maqfort' ),
		'items_list_navigation' => __( 'Navegação de lista de Tabelas', 'maqfort' ),
		'filter_items_list'     => __( 'Filtrar lista de Tabelas', 'maqfort' ),
	);

	$args = array(
		'label'                 => __( 'Tabelas', 'maqfort' ),
		'description'           => __( 'Tabelas de Especificações de Produtos', 'maqfort' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-grid-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array(
			'slug' => __( 'tabela', 'maqfort' ),
			'with_front' => false,
		),
	);

	register_post_type( 'mf_tables', $args );

}


/*----------- Refresh rewrite rules on theme activation -----------*/
add_action( 'after_setup_theme', 'mf_flush_rewrite_rule_on_activation' );

function mf_flush_rewrite_rule_on_activation() {
	// trigger our function that registers the custom post type
	mf_register_custom_tax();
	mf_register_custom_post_type_products();
	mf_register_custom_post_type_tables();
	// clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}

/*----------- Change term request -----------*/

 /* Taken from: https://rudrastyh.com/wordpress/remove-taxonomy-slug-from-urls.html */
add_filter( 'request', 'mf_change_term_request', 1, 1 );

function mf_change_term_request( $query ) {

	$tax_name = 'mf_tipos_de_produtos'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'.
	// Request for child terms differs, we should make an additional check.

	if ( isset( $query['attachment'] ) && $query['attachment'] ) :
		$include_children = true;
		$name = $query['attachment'];
	else :
		$include_children = false;
		if ( isset( $query['name'] ) ) :
			$name = $query['name'];
	else :
		$name = '';
	endif;
	endif;

	$term = get_term_by( 'slug', $name, $tax_name ); // get the current term to make sure it exists

	if ( isset( $name ) && $term && ! is_wp_error( $term ) ) : // check it here

		if ( $include_children ) {
			unset( $query['attachment'] );
			$parent = $term->parent;
			while ( $parent ) {
				$parent_term = get_term( $parent, $tax_name );
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset( $query['name'] );
		}

		switch ( $tax_name ) :
			case 'category':{
				$query['category_name'] = $name; // for categories
				break;
			}
			case 'post_tag':{
				$query['tag'] = $name; // for post tags
				break;
			}
			default:{
				$query[ $tax_name ] = $name; // for another taxonomies
				break;
			}
		endswitch;

	endif;

	return $query;

}

add_filter( 'term_link', 'mf_term_permalink', 10, 3 );

function mf_term_permalink( $url, $term, $taxonomy ) {

	$taxonomy_name = 'mf_tipos_de_produtos'; // your taxonomy name here.
	$taxonomy_slug = 'tipos_de_produtos'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' ).
	// exit the function if taxonomy slug is not in URL
	if ( strpos( $url, $taxonomy_slug ) === false || $taxonomy != $taxonomy_name ) {
		return $url;
	}

	$url = str_replace( '/' . $taxonomy_slug, '', $url );
	return $url;
}

/*----------- Redirect old term -----------*/
add_action( 'template_redirect', 'mf_old_term_redirect' );

function mf_old_term_redirect() {

	$taxonomy_name = 'mf_tipos_de_produtos';
	$taxonomy_slug = 'tipos_de_produtos';

	// exit the redirect function if taxonomy slug is not in URL
	if ( strpos( $_SERVER['REQUEST_URI'], $taxonomy_slug ) === false ) {
		return;
	}

	if ( ( is_category() && $taxonomy_name == 'category' ) || ( is_tag() && $taxonomy_name == 'post_tag' ) || is_tax( $taxonomy_name ) ) :

			wp_redirect( site_url( str_replace( $taxonomy_slug, '', $_SERVER['REQUEST_URI'] ) ), 301 );
		exit();

	endif;

}
