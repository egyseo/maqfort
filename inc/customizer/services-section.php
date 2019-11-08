<?php
/**
 * -----------------------------------------------------------
 * Customizer section to customize the home services section.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */


// Add a new customizer section to our theme panel panel.
$wp_customize->add_section(
	'mf_services_section',
	array(
		'priority'       => 2,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Home Services', 'maqfort' ),
		'panel'          => 'mf_theme_panel',
	)
);

/*
 * ----------- Image Poster -----------
 */
$wp_customize->add_setting(
	'mf_services_background_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'mf_services_background_image',
		array(
			'label'    => __( 'Imagem de background', 'maqfort' ),
			'section'  => 'mf_services_section',
			'priority' => 1,
		)
	)
);

/*
 * ----------- Background filter -----------
 */
$wp_customize->add_setting(
	'mf_services_background_overlay',
	array(
		'default' => 'rgba(23,23,23,.7)',
	)
);

$wp_customize->add_control(
	new Customize_Alpha_Color_Control(
		$wp_customize,
		'mf_services_background_overlay',
		array(
			'label'        => __( 'Overlay do background', 'maqfort' ),
			'section'      => 'mf_services_section',
			'priority'     => 2,
			'show_opacity' => true,
			'palette'      => array(
				'rgb(150, 50, 220)',
				'rgba(50,50,50,0.8)',
				'rgba( 255, 255, 255, 0.2 )',
				'#00CC99',
			),
		)
	)
);
