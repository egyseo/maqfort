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

		<ul class="contacts-widget">
			<?php if ( ! empty( $instance['text'] ) ) { ?>
				<li class="contacts-row"><div class="icon-box"><i class="fa fa-map-marker" aria-hidden="true"></i></div><div class="contact-block"><p><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></p></div><!-- address ends --> </li><?php } ?>

			<?php if ( ! empty( $instance['phone'] ) ) { ?>
				<li class="contacts-row"><div class="icon-box"><i class="fa fa-phone" aria-hidden="true"></i></div><div class="contact-block"><p><span><?php _e( 'Phone', 'maqfort' ); ?></span> <?php echo $instance['phone']; ?></p> <?php } ?>
					<p><?php if ( ! empty( $instance['fax'] ) ) { ?><span> <?php _e( 'Fax', 'amob' ); ?></span> <?php echo $instance['fax']; ?> </p>
				</div><!-- phone ends --> </li> <?php } ?>

			<?php if ( ! empty( $instance['email'] ) ) { ?>
				<li class="contacts-row"><div class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></div><div class="contact-block"><p><span> <?php echo $instance['email']; ?></span></p></div><!-- email ends --> </li> <?php } ?>

			<?php if ( ! empty( $instance['gps'] ) ) { ?>
				<li class="contacts-row"><div class="icon-box"><i class="fa fa-road" aria-hidden="true"></i></div><div class="contact-block"><p><span><?php _e( 'GPS', 'maqfort' ); ?></span> <?php echo $instance['gps']; ?></p></div><!-- gps ends --> </li><?php } ?>
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
* 2.0 Register the contacts widget.
* -----------------------------------------------------------
*/
function maqfort_register_widgets() {
	register_widget( 'MAQFORT_Contacts_Widget' );
}
add_action( 'widgets_init', 'maqfort_register_widgets' );


/*
* -----------------------------------------------------------
* 4.0 Creat social icons widget.
* -----------------------------------------------------------
*/
class MAQFORT_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'maqfort_social_widget', // Base ID
			esc_html__( 'Social Icons', 'maqfort' ), // Name
			array( 'description' => esc_html__( 'Your Social Urls', 'maqfort' ), ) // Args
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

		<ul class="social-icons-widget">
			<?php if ( ! empty( $instance['linkedin'] ) ) { ?>
				<li><a href="<?php echo $instance['linkedin']; ?>" target="_blank" class="linkedin-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>

      <?php if ( ! empty( $instance['youtube'] ) ) { ?>
				<li><a href="<?php echo $instance['youtube']; ?>" target="_blank" class="youtube-icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li><?php } ?>

      <?php if ( ! empty( $instance['facebook'] ) ) { ?>
        <li><a href="<?php echo $instance['facebook']; ?>" target="_blank" class="facebook-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>

      <?php if ( ! empty( $instance['twitter'] ) ) { ?>
        <li><a href="<?php echo $instance['twitter']; ?>" target="_blank" class="twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>

      <?php if ( ! empty( $instance['google'] ) ) { ?>
        <li><a href="<?php echo $instance['google']; ?>" target="_blank" class="google-icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
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
		<?php $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : esc_html__( 'Linkedin URL', 'maqfort' ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_attr_e( 'Linkedin URL:', 'maqfort' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>">
		</p>
    <?php $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : esc_html__( 'Youtube URL', 'maqfort' ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'Youtube URL:', 'maqfort' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>">
    </p>
    <?php $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( 'Facebook URL', 'maqfort' ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook URL:', 'maqfort' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
    </p>
    <?php $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( 'Twitter URL', 'maqfort' ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter URL:', 'maqfort' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
    </p>
    <?php $google = ! empty( $instance['google'] ) ? $instance['google'] : esc_html__( 'Google URL', 'maqfort' ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php esc_attr_e( 'Google URL:', 'maqfort' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>">
    </p><?php

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
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['google'] = ( ! empty( $new_instance['google'] ) ) ? strip_tags( $new_instance['google'] ) : '';

		return $instance;
	}

}

/*
* -----------------------------------------------------------
* 4.0 Register the widget.
* -----------------------------------------------------------
*/
function maqfort_register_social_widgets() {
	register_widget( 'MAQFORT_Social_Widget' );
}
add_action( 'widgets_init', 'maqfort_register_social_widgets' );
