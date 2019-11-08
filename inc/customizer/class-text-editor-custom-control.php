<?php
/**
 * -----------------------------------------------------------
 * Register custom type for customizer
 *
 * @file
 * @package maqfort
 * -----------------------------------------------------------
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) :
	return null;
endif;


/**
 * TinyMCE Custom Control
 *
 * @link https://github.com/maddisondesigns
 */
class Maqfort_TinyMCE_Custom_Control extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'tinymce_editor';

	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		wp_enqueue_script( 'm,aqfort-customizer-custom-controls-js', get_template_directory_uri() . '/assets/js/customizer-panel.js', array( 'jquery' ), wp_rand(), true );
		/* wp_enqueue_style( '-custom-controls-css', get_template_directory_uri() . '/assets/css/customizer.css', array(), wp_rand(), 'all' ); */
		wp_enqueue_editor();
	}

	/**
	 * Pass our TinyMCE toolbar string to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['skyrockettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
		$this->json['skyrockettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
		$this->json['skyrocketmediabuttons']    = isset( $this->input_attrs['mediaButtons'] ) && ( true === $this->input_attrs['mediaButtons'] ) ? true : false;
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
	?>
		<div class="tinymce-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
			<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
		</div>
	<?php
	}
}
