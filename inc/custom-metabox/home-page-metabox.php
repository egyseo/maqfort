<?php
/*
* -----------------------------------------------------------
* Metabox for maqfort services on home page.
* -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_homepage_services' ) ) {

	function mf_homepage_services() {

		$prefix = '_mf_homepage_';

		/**
		 * Initiate the metabox
		 */
		$cmb = new_cmb2_box(
			array(
				'id'            => $prefix . 'services',
				'title'         => __( 'Serviços MAQFORT', 'maqfort' ),
				'object_types'  => array( 'page' ), // Post type
				'show_on'      => array(
					'key' => 'page-template',
					'value' => 'page-home.php',
				),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // Keep the metabox closed by default
			)
		);
		// start group field
		$group_field_id = $cmb->add_field(
			array(
				'id'          => $prefix . 'itens',
				'type'        => 'group',
				'description' => __( 'Adicionar Serviços', 'maqfort' ),
				// 'repeatable'  => false, // use false if you want non-repeatable group
				'options'     => array(
					'group_title'   => __( 'Serviço {#}', 'maqfort' ), // since version 1.1.4, {#} gets replaced by row number
					'add_button'    => __( 'Adicionar Serviço', 'maqfort' ),
					'remove_button' => __( 'Remover Serviço', 'maqfort' ),
					'sortable'      => true, // beta
					'closed'     => true, // true to have the groups closed by default
				),
			)
		);

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Nome do Serviços', 'maqfort' ),
				'description' => __( 'Insira aqui o nome do serviços', 'maqfort' ),
				'id'   => $prefix . 'title',
				'type' => 'text',
			)
		);

		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Descrição do Serviços', 'maqfort' ),
				'description' => '',
				'id'   => $prefix . 'description',
				'type' => 'textarea',
			)
		);

		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'URL', 'maqfort' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
			)
		);

		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Imagem do Serviço', 'maqfort' ),
				'id'   => $prefix . 'image',
				'type' => 'file',
			)
		);

		$cmb->add_group_field(
			$group_field_id,
			array(
				'name' => __( 'Icon do Serviço', 'maqfort' ),
				'id'   => $prefix . 'icon',
				'type' => 'fontawesome_icon',
			)
		);

	}

	add_action( 'cmb2_init', 'mf_homepage_services' );

}
