<?php
/*
* -----------------------------------------------------------
* Metabox for contacts page.
* -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_contacts' ) ) {

	function mf_contacts() {

		$prefix = '_mf_contacts_';

		/**
		 * Initiate the metabox
		 */
		$cmb = new_cmb2_box(
			array(
				'id'            => $prefix . 'details',
				'title'         => __( 'MAQFORT Contactos', 'maqfort' ),
				'object_types'  => array( 'page' ), // Post type
				'show_on'       => array(
					'key' => 'page-template',
					'value' => 'page-contacts.php',
				),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // Keep the metabox closed by default
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Titlo', 'maqfort' ),
				'description' => __( 'Titlo da morada', 'maqfort' ),
				'id'   => $prefix . 'title',
				'type' => 'text',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Morada', 'maqfort' ),
				'desc' => __( 'Insira aqui a morada', 'maqfort' ),
				'default' => '',
				'id' => $prefix . 'address',
				'type' => 'textarea_small',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Telefone', 'maqfort' ),
				'description' => __( 'Insira aqui o telefone', 'maqfort' ),
				'id'   => $prefix . 'phone',
				'type' => 'text',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Email', 'maqfort' ),
				'description' => __( 'Insira aqui o email de contacto', 'maqfort' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
			)
		);

		$cmb->add_field(
			array(
				'name'    => __( 'Código para o mapa Google', 'maqfort' ),
				'id'      => $prefix . 'map',
				'type'    => 'textarea_code',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Titlo do Formulário', 'maqfort' ),
				'id'   => $prefix . 'form_title',
				'type' => 'text',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Descrição', 'maqfort' ),
				'desc' => __( 'Descrição do formulário', 'maqfort' ),
				'default' => '',
				'id' => $prefix . 'form_description',
				'type' => 'text',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Shorcode do Formulário', 'maqfort' ),
				'id'   => $prefix . 'form_shortcode',
				'type' => 'text',
			)
		);

	}

	add_action( 'cmb2_init', 'mf_contacts' );

}
