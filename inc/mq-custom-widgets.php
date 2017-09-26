<?php

/*
* -----------------------------------------------------------
* 1.0 Creat contacts widget.
* -----------------------------------------------------------
*/
class MAQFORT_Contacts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'maqfort_contacts_widget', // Base ID
			esc_html__( 'Contacts', 'maqfort' ), // Name
			array( 'description' => esc_html__( 'Your contacts', 'maqfort' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
    $widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $text = apply_filters( 'widget_text', $widget_text, $instance, $this );

    ?>

		<ul>
			<?php if ( ! empty( $instance['text'] ) ) { ?>
				<li><div class="icon-box"><i class="fa fa-map-marker" aria-hidden="true"></i></div><div class="contact-block"><p<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p></div><!-- address ends --> </li><?php } ?>

			<?php if ( ! empty( $instance['phone'] ) ) { ?>
				<li><div class="icon-box"><i class="fa fa-phone" aria-hidden="true"></i></div><div class="contact-block"><p><span><?php _e( 'Phone', 'maqfort' ); ?></span> <?php echo $instance['phone']; ?></p> <?php } ?>
					<p><?php if ( ! empty( $instance['fax'] ) ) { ?><span> <?php _e( 'Fax', 'amob' ); ?></span> <?php echo $instance['fax']; ?> </p>
				</div><!-- phone ends --> </li> <?php } ?>

			<?php if ( ! empty( $instance['email'] ) ) { ?>
				<li><div class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></div><div class="contact-block"><p><span> <?php echo $instance['email']; ?></span></p></div><!-- email ends --> </li> <?php } ?>

			<?php if ( ! empty( $instance['gps'] ) ) { ?>
				<li><div class="icon-box"><i class="fa fa-road" aria-hidden="true"></i></div><div class="contact-block"><p><span><?php _e( 'GPS', 'maqfort' ); ?></span> <?php echo $instance['gps']; ?></p></div><!-- gps ends --> </li><?php } ?>
		</ul>

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'maqfort' );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;?>
		<p>
  		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'maqfort' ); ?></label>
  		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
			$text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( 'Address', 'maqfort' );
	 	?>
    <p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_attr_e( 'Adress:', 'maqfort' ); ?></label>
    		<textarea class="widefat" rows="6" cols="6" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

    		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php esc_attr_e( 'Automatically add paragraphs', 'maqfort' ); ?></label></p>
		<?php
			$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( 'Phone', 'maqfort' );
	 	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_attr_e( 'Phone:', 'maqfort' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
			<?php
				$fax = ! empty( $instance['fax'] ) ? $instance['fax'] : esc_html__( 'Fax:', 'maqfort' );
		 	?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php esc_attr_e( 'Fax:', 'maqfort' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>">
		</p>
		<?php
			$email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( 'Email', 'maqfort' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'maqfort' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<?php
			$gps = ! empty( $instance['gps'] ) ? $instance['gps'] : esc_html__( 'Your GPS coordinates', 'maqfort' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'gps' ) ); ?>"><?php esc_attr_e( 'GPS:', 'maqfort' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gps' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gps' ) ); ?>" type="text" value="">
		</p>
		<?php
	}

  /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
    if ( current_user_can( 'unfiltered_html' ) ) {
      $instance['text'] = $new_instance['text'];
    } else {
      $instance['text'] = wp_kses_post( $new_instance['text'] );
    }
    $instance['filter'] = ! empty( $new_instance['filter'] );
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? strip_tags( $new_instance['fax'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['gps'] = ( ! empty( $new_instance['gps'] ) ) ? strip_tags( $new_instance['gps'] ) : '';

		return $instance;
	}

}

/*
* -----------------------------------------------------------
* 4.0 Register the widget.
* -----------------------------------------------------------
*/
function maqfort_register_widgets() {
	register_widget( 'MAQFORT_Contacts_Widget' );
}
add_action( 'widgets_init', 'maqfort_register_widgets' );
