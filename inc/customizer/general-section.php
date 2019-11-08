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

/*
 * ----------- Blog page description -----------
 */
$wp_customize->add_setting(
	'news_page_desc',
	array(
		'default'           => 'Siga as nossas últimas notícias e mantenha-s actualizado com o mundo das máquinas e ferramentas da MAQFORT!',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'news_page_desc',
		array(
			'type'     => 'textarea',
			'section'  => 'general_settings',
			'priority' => 1,
			'label'    => __( 'Descrição na página de notícias.', 'maqfort' ),
		)
	)
);

/*
 * ----------- Page headers banners overlay -----------
 */
$wp_customize->add_setting(
	'mf_page_headers_banners_overlay',
	array(
		'default'  => 'rgba(0, 0, 0, .7)',
		'priority' => 2,
	)
);

$wp_customize->add_control(
	new Customize_Alpha_Color_Control(
		$wp_customize,
		'mf_page_headers_banners_overlay',
		array(
			'label'        => __( 'Overlay de banners das páginas', 'maqfort' ),
			'section'      => 'general_settings',
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
