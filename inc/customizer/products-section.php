<?php
/**
 * -----------------------------------------------------------
 * Settings and options relative to the products.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$wp_customize->add_section(
	'mf_products_section',
	array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Definições dos Produtos', 'maqfort' ),
		'panel'          => 'mf_theme_panel',
	)
);

/*
 * ----------- Product general catalog button -----------
 */
$wp_customize->add_setting(
	'mf_products_catalogue_button',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	new WP_Customize_Upload_Control(
		$wp_customize,
		'mf_products_catalogue_button',
		array(
			'label'       => __( 'Catálogo geral de Produtos', 'maqfort' ),
			'section'     => 'mf_products_section',
			'priority'    => 1,
			'description' => '',
		)
	)
);

/*
 * ----------- Product more info form shortcode -----------
 */
$wp_customize->add_setting(
	'mf_product_form',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_html',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mf_product_form',
		array(
			'type'        => 'text',
			'section'     => 'mf_products_section',
			'priority'    => 2,
			'label'       => __( 'Shortcode para o formulário do produto', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Product laser image -----------
 */
$wp_customize->add_setting(
	'mf_product_block_laser_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'mf_product_block_laser_image',
		array(
			'label'    => __( 'Bloco laser - Imagem', 'maqfort' ),
			'section'  => 'mf_products_section',
			'priority' => 3,
		)
	)
);

/*
 * ----------- Product laser block content -----------
 */
$wp_customize->add_setting(
	'mf_product_block_laser[editor_content]',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new Text_Editor_Custom_Control(
		$wp_customize,
		'mf_product_block_laser[editor_content]',
		array(
			'type'        => 'textarea',
			'section'     => 'mf_products_section',
			'priority'    => 4,
			'label'       => __( 'Bloco laser - Descrição', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Product laser block content -----------
 */
$wp_customize->add_setting(
	'mf_product_block_industry[editor_content]',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new Text_Editor_Custom_Control(
		$wp_customize,
		'mf_product_block_industry[editor_content]',
		array(
			'type'        => 'textarea',
			'section'     => 'mf_products_section',
			'priority'    => 5,
			'label'       => __( 'Bloco indústria 4.0', 'maqfort' ),
			'description' => '',
		)
	)
);


/*
 * ----------- Product archive page description -----------
 */
$wp_customize->add_setting(
	'mf_products_archives_description',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_html',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mf_products_archives_description',
		array(
			'type'     => 'textarea',
			'section'  => 'mf_products_section',
			'priority' => 6,
			'label'    => __( 'Descrição página de arquivos dos produtos', 'maqfort' ),
		)
	)
);

/*
 * ----------- Product archive banner -----------
 */
$wp_customize->add_setting(
	'mq_products_archives_banner',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'mq_products_archives_banner',
		array(
			'label'    => __( 'Banner da página de arquivos de produtos', 'maqfort' ),
			'section'  => 'mf_products_section',
			'priority' => 7,
		)
	)
);
