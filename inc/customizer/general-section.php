<?php
/*
* General Seetings
*/
$wp_customize->add_section(
	'general_settings',
	array(
		'priority' => 4,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Definições Gerais', 'maqfort' ),
		'panel' => 'mf_theme_panel',
	)
);

// Settings
$wp_customize->add_setting(
	'news_page_desc',
	array(
		'default' => 'Siga as nossas últimas notícias e mantenha-s actualizado com o mundo das máquinas e ferramentas da MAQFORT!',
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
		'news_page_desc',
		array(
			'type' => 'textarea',
			'section'    => 'general_settings',
			'priority'   => 4,
			'label' => __( 'Descrição na página de notícias.', 'maqfort' ),
		)
	)
);
