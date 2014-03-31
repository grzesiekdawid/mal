<?php

/**
 * Handles including the widget class files, and registering the widgets in
 * WordPress and Genesis Framework.
 *
 * @category Ayo
 * @package  Widgets
 */

/** Allow widget text to do shortcode */
add_filter( 'widget_text', 'do_shortcode' );

/** Register widget areas for slider or other */
genesis_register_sidebar( array(
	'id'          => 'ayo-homepage-slider',
	'name'        => __( 'Homepage Slider', 'ayo' ),
	'description' => __( 'If you prefer to use third party slider plugin, this widget area will replace Ayo built-in slider.', 'ayo' ),
) );

/** Register widget areas for intro*/
genesis_register_sidebar( array(
	'id'			=> 'ayo-homepage-widget',
	'name'			=> __( 'Homepage Widget Area', 'ayo' ),
	'description'	=> __( 'This widget area will show below Ayo slider at Homepage-slider template. (3 columns)', 'ayo' ),
) );

/** Register footer widget areas*/
genesis_register_sidebar( array(
	'id'			=> 'ayo-footer-widget',
	'name'			=> __( 'Footer widget', 'ayo' ),
	'description'	=> __( 'This widget will show below copyright text at footer area.', 'ayo' ),
) );

/** Load The widget */
require_once( CHILD_THEME_WIDGETS_DIR . 'ayo-icon-widget.php' );

add_action( 'widgets_init', 'ayo_load_widgets' );
/**
 * Register widgets for use in the Genesis theme.
 *
 * @since 1.0
 */
function ayo_load_widgets() {

	register_widget( 'Ayo_Text_Icon_Widget' );

}