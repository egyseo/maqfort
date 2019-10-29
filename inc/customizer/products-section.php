<?php
/*
* Products Settings
*/
$wp_customize->add_section(
	'products_section',
	array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Definições de produtos', 'maqfort' ),
		'panel' => 'mf_theme_panel',
	)
);

// Settings
$wp_customize->add_setting(
	'products_catalogue_button',
	array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);

// Controls
$wp_customize->add_control(
	new WP_Customize_Upload_Control(
		$wp_customize,
		'products_catalogue_button',
		array(
			'label'      => __( 'Catálogo de Produtos Geral', 'maqfort' ),
			'section'    => 'products_section',
			'priority'   => 1,
			'description' => '',
		)
	)
);


// Settings
$wp_customize->add_setting(
	'product_form',
	array(
		'default' => '[rev_slider alias=homeslider]',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	)
);

// Controls
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'product_form',
		array(
			'type' => 'text',
			'section'    => 'products_section',
			'priority'   => 2,
			'label' => __( 'Shortcode do Formulário', 'maqfort' ),
			'description' => '',
		)
	)
);
