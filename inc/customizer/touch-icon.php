<?php
/*
* Topuch Icons Section
*/
$wp_customize->add_section( 'images_icons', array(
    'priority' => 4,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Icons', 'maqfort'),
    'description' => __('Icons para iPad, iPhone e Android', 'maqfort'),
    'panel' => 'mf_theme_panel',
) );
/*----------- iPhone(first generation or 2G), iPhone 3G, iPhone 3GS -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-phone', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-phone',
    array(
    'label'      => __('Touch Icon iPhone', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPhone(first generation or 2G), iPhone 3G, iPhone 3GS. Tamanho: 57x57', 'maqfort')
  ) )
);
/*----------- iPad and iPad mini @1x -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-ipad', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-ipad',
    array(
    'label'      => __('Touch Icon iPad', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPad and iPad mini @1x. Tamanho: 76x76', 'maqfort')
  ) )
);
/*----------- iPhone 4, iPhone 4s, iPhone 5, iPhone 5c, iPhone 5s, iPhone 6, iPhone 6s, iPhone 7, iPhone 7s, iPhone8 -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-iphone-retina', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-iphone-retina',
    array(
    'label'      => __('Touch Icon iPhone Retina', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPhone 4, iPhone 4s, iPhone 5, iPhone 5c, iPhone 5s, iPhone 6, iPhone 6s, iPhone 7, iPhone 7s, iPhone8. Tamanho: 120x120', 'maqfort')
  ) )
);
/*----------- iPad and iPad mini @2x -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-ipad-retina', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-ipad-retina',
    array(
    'label'      => __('Touch Icon iPad e iPad mini', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPad and iPad mini @2x. Tamanho: 152x152', 'maqfort')
  ) )
);
/*----------- iPad Pro -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-ipad-pro', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-ipad-pro',
    array(
    'label'      => __('Touch Icon iPad Pro', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPad Pro. Tamanho: 167x167', 'maqfort')
  ) )
);
/*----------- iPhone X, iPhone 8 Plus, iPhone 7 Plus, iPhone 6s Plus, iPhone 6 Plus -----------*/
// Settings
$wp_customize->add_setting( 'touch-icon-iphone-6-plus', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'touch-icon-iphone-6-plus',
    array(
    'label'      => __('Touch Icon iPhone X', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para iPhone X, iPhone 8 Plus, iPhone 7 Plus, iPhone 6s Plus, iPhone 6 Plus. Tamanho: 180x180', 'maqfort')
  ) )
);
/*----------- Android Devices High Resolution -----------*/
// Settings
$wp_customize->add_setting( 'android-icon-hd', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'android-icon-hd',
    array(
    'label'      => __('Icon Android Grandes Resoluções', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para Android com grandes resoluções. Tamanho: 192x192', 'maqfort')
  ) )
);
/*----------- Android Devices Normal Resolution -----------*/
// Settings
$wp_customize->add_setting( 'android-icon', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
) );
// Control
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
    'android-icon',
    array(
    'label'      => __('Icon Android', 'maqfort'),
    'section'    => 'images_icons',
    'description' => __('Icon para Android com resoluções normais. Tamanho: 128x128', 'maqfort')
  ) )
);
