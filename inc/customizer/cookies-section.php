<?php
/*
* Cookies Section
*/

// Settings
$wp_customize->add_setting( 'cookies_msg', array(
  'default' => 'Este site utiliza cookies para melhorar a sua experiência de navegação no mesmo. Ao continuar a navegar neste site, concorda com a sua utilização e a nossa política de privacidade.',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );

// Controls
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookies_msg', array(
    'type' => 'textarea',
    'section'    => 'general_settings',
    'priority'   => 6,
    'label' => __( 'Mensagem dos Cookies', 'maqfort' ),
    'description' => ''
  )
));

// Setting
$wp_customize->add_setting( 'cookies_read_more', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'esc_html',
) );

// Control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookies_read_more', array(
    'type' => 'text',
    'section'    => 'general_settings',
    'priority'   => 7,
    'label' => __( 'Link de cookies para a página de política de privacidade:', 'maqfort' ),
    'description' => ''
  )
));
