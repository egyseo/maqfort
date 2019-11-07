<?php
/**
 * -----------------------------------------------------------
 * Customizer section to customize the home hero section.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */


// Add a new customizer section to our theme panel panel.
$wp_customize->add_section(
	'hero_section',
	array(
		'priority'       => 6,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Home Banner', 'maqfort' ),
		'panel'          => 'mf_theme_panel',
	)
);

/*
 * ----------- Title -----------
 */
$wp_customize->add_setting(
	'mf_hero_title',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mf_hero_title',
		array(
			'type'        => 'textarea',
			'section'     => 'hero_section',
			'priority'    => 1,
			'label'       => __( 'Título', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Description -----------
 */
$wp_customize->add_setting(
	'mf_hero_description',
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
		'mf_hero_description',
		array(
			'type'        => 'textarea',
			'section'     => 'hero_section',
			'priority'    => 3,
			'label'       => __( 'Descrição', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Button Text -----------
 */
$wp_customize->add_setting(
	'mf_hero_link_text',
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
		'mf_hero_link_text',
		array(
			'type'        => 'text',
			'section'     => 'hero_section',
			'priority'    => 4,
			'label'       => __( 'Texto do link', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Button url-----------
 */
$wp_customize->add_setting(
	'mf_hero_link_url',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mf_hero_link_url',
		array(
			'type'        => 'text',
			'section'     => 'hero_section',
			'priority'    => 5,
			'label'       => __( 'URL do link', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Button Text 2 -----------
 */
$wp_customize->add_setting(
	'mf_hero_link_text_2',
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
		'mf_hero_link_text_2',
		array(
			'type'        => 'text',
			'section'     => 'hero_section',
			'priority'    => 6,
			'label'       => __( 'Texto do link secondário', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Button url 2 -----------
 */
$wp_customize->add_setting(
	'mf_hero_link_url_2',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'mf_hero_link_url_2',
		array(
			'type'        => 'text',
			'section'     => 'hero_section',
			'priority'    => 7,
			'label'       => __( 'URL do link secundário', 'maqfort' ),
			'description' => '',
		)
	)
);

/*
 * ----------- Video Poster -----------
 */
$wp_customize->add_setting(
	'mf_hero_video_poster',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'mf_hero_video_poster',
		array(
			'label'    => __( 'Video Poster', 'maqfort' ),
			'section'  => 'hero_section',
			'priority' => 8,
		)
	)
);

/*
 * ----------- Video .mp4 -----------
 */
$wp_customize->add_setting(
	'mf_hero_video_mp4',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Upload_Control(
		$wp_customize,
		'mf_hero_video_mp4',
		array(
			'label'    => __( 'Video .mp4', 'maqfort' ),
			'section'  => 'hero_section',
			'priority' => 9,
		)
	)
);

/*
 * ----------- Video .webm -----------
 */
$wp_customize->add_setting(
	'mf_hero_video_webm',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Upload_Control(
		$wp_customize,
		'mf_hero_video_webm',
		array(
			'label'    => __( 'Video .webm', 'maqfort' ),
			'section'  => 'hero_section',
			'priority' => 10,
		)
	)
);

/*
 * ----------- Video .ogv -----------
 */
$wp_customize->add_setting(
	'mf_hero_video_ogv',
	array(
		'default'           => '',
		'sanitize_callback' => 'maqfort_custom_text_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Upload_Control(
		$wp_customize,
		'mf_hero_video_ogv',
		array(
			'label'    => __( 'Video .ogv', 'maqfort' ),
			'section'  => 'hero_section',
			'priority' => 10,
		)
	)
);

/*
 * ----------- Video filter -----------
 */
$wp_customize->add_setting(
	'mf_hero_video_filter',
	array(
		'default'  => 'rgba(23,23,23,.7)',
		'priority' => 11,
	)
);

$wp_customize->add_control(
	new Customize_Alpha_Color_Control(
		$wp_customize,
		'mf_hero_video_filter',
		array(
			'label'        => __( 'Filtro do video', 'maqfort' ),
			'section'      => 'hero_section',
			'priority'     => 9,
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
