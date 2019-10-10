<?php
function crew_customize_register( $wp_customize ) {
  // Do stuff with $wp_customize, the WP_Customize_Manager object.
  // New panel for the theme options.
  $wp_customize->add_panel( 'mf_theme_panel', array(
      'priority' => 1,
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'title' => __( 'Definições MAQFORT', 'maqfort' ),
      'description' => __( 'Opções do tema MAQFORT', 'maqfort' ),
  ) );

  require get_parent_theme_file_path( '/inc/customizer/touch-icon.php' );
  require get_parent_theme_file_path( '/inc/customizer/social-icons.php' );
}
add_action( 'customize_register', 'crew_customize_register' );
