<?php
/**
 * This file controls all part of bbPress Tweaks
 *
 * @package Ayo Shop
 * @author AyoThemes
 * @since 1.1
 */


add_action( 'admin_notices', 'ayo_bbpress_notification' );
/** 
 * Make it sure to install 'bbPress Genesis Extend' if using bbPress plugin
 * 
 * @since 1.1 
 */
function ayo_bbpress_notification(){

	if ( class_exists( 'bbPress' ) && class_exists( 'BBP_Genesis' ) ) {
    	return;
	} elseif ( class_exists( 'bbPress' ) && ! class_exists( 'BBP_Genesis' ) ) {
		echo '<div class="updated"><p>'.sprintf( __( 'One more step to make %s compatible with bbPress. Please <b>install</b> and <b>activate</b> <a href="%s" target="_blank">bbPress Genesis Extend</a> plugin.', 'ayo' ), CHILD_THEME_NAME,  'http://wordpress.org/extend/plugins/bbpress-genesis-extend/' ).'</p></div>';
	}

}

add_post_type_support( 'topic', 'genesis-layouts' );
add_post_type_support( 'topic', 'genesis-seo'     );

//remove forum and single topic summaries at the top of the page
add_filter( 'bbp_get_single_forum_description', 'ayo_bbpress_filter_form_message', 10, 2 );
add_filter( 'bbp_get_single_topic_description', 'ayo_bbpress_filter_form_message', 10, 2 );
/** 
 * Remove unnecessary
 * 
 * @since 1.1 
 */
function ayo_bbpress_filter_form_message( $retstr, $args ){
	return false;
}

if( !is_admin()) add_action( 'bbp_enqueue_scripts', 'ayo_bbpress_styles', 15 ); 
/** 
 * Remove bbPress default stylesheet and replace with ayoshop stylesheet
 * 
 * @since 1.1 
 */
function ayo_bbpress_styles(){
    wp_enqueue_style( 'ayo-bbpress', CHILD_THEME_LIB_URL.'/css/ayo-bbpress.css', array(), CHILD_THEME_VERSION, 'all' );
    wp_dequeue_style( array( 'bbp-child-bbpress', 'bbp-parent-bbpress', 'bbp-default-bbpress', 'bbpress-genesis-extend' ) );
}

if( !is_admin()) add_action( 'wp_enqueue_scripts', 'ayo_dequeue_bbpress_extend_style', 15 );
/** 
 * Remove bbPress Genesis Extend stylesheet
 * 
 * @since 1.1 
 */
function ayo_dequeue_bbpress_extend_style(){
	wp_dequeue_style( 'bbpress-genesis-extend' );
}

add_filter( 'bbp_before_get_breadcrumb_parse_args', 'ayo_custom_forum_breadcrumb', 999 );
/** 
 * bbPress breadcrumb tweaks
 * 
 * @since 1.1 
 */
function ayo_custom_forum_breadcrumb( $args ) {

	$args['before'] = '<div class="breadcrumb">';
	$args['after'] 	= '</div>';

	return $args;
}