<?php
/*
Plugin Name: Widgets Text Icon
Plugin URI: https://github.com/aryaprakasa/ayo-text-icon
Description: Basically is a text widget but with icon selector based on font-awesome.
Author: Arya Prakasa
Author URI: http://prakasa.me/

Version: 0.0.1

License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

class Ayo_Text_Icon_Widget extends WP_Widget {

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor method.
	 *
	 * Set some global values and create widget.
	 */
	function __construct() {

		/**
		 * Default widget option values.
		 */
		$this->defaults = array(
			'title'		=> '',
			'icon'		=> '',
			'text'		=> '',
			'filter'	=> 0
		);


		$widget_ops = array(
			'classname'	  => 'ayo-text-icon',
			'description' => __( 'Displays icon before widget title.', 'ayo' ),
		);

		$control_ops = array(
			'id_base' => 'ayo-text-icon',
			'width'   => 400,
			#'height'  => 200,
		);

		$this->WP_Widget( 'ayo-text-icon', __( 'Ayo - Text Icon', 'ayo' ), $widget_ops, $control_ops );

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon', 'ayo' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
				<?php
				foreach ( ayo_font_awesome_array() as $icons => $icon ) {
					printf( '<option value="%s" %s>%s</option>', $icon, selected( $icon, $instance['icon'], 0 ), $icon );
				}
				?>
			</select>

		</p>

		<textarea class="widefat" rows="14" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($instance['text']); ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>

		<?php

	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon'] = $new_instance['icon'];
		$instance['size'] = $new_instance['size'];

		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
		$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );

		$icon = '<i class="icon-'.$instance['icon'].' icon-large" ></i>';
		
		echo $before_widget;

		if ( !empty( $title ) ) { echo $before_title . $icon . $title . $after_title; }?>

		<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>

		<?php  echo $after_widget;

	}

}