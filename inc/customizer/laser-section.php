<?php

// Section for the social icons.
$wp_customize->add_section('laser_section', array(
    'priority' => 5,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Laser', 'maqfort' ),
    'description' => __( 'Insira aqui os dados do bloco sobre lasers.', 'maqfort' ),
    'panel' => 'mf_theme_panel',
) );

$wp_customize->add_setting( 'laser_description', array(
  'default'           => '',
  'type'              => 'theme_mod',
  'capability'        => 'edit_theme_options',
  'transport'         => '',
  'sanitize_callback' => 'esc_textarea',
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'laser_description', array(
    'type'        => 'textarea',
    'section'     => 'laser_section',
    'priority'    => 1,
    'label'       => __( 'Descrição do Laser:', 'maqfort' ),
    'description' => ''
  )
));

// Settings
$wp_customize->add_setting('laser_image', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'laser_image', array(
    'label'      => __('Imagem do Laser', 'maqfort'),
    'section'    => 'laser_section',
    'description' => '',
  ) )
);
