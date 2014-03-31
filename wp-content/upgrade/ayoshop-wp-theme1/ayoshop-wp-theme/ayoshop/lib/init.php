<?php
/**
 * This file controls all parts of the Ayo Child Theme Initialization.
 *
 * @package Ayo Shop
 * @author AyoThemes
 */

add_action( 'genesis_setup', 'ayoshop_setup', 15 );
/**
 * This function defines Ayo theme constants
 *
 * @since 1.0
 */
function ayoshop_setup(){

	/** Define Theme Info Constants */
	$ayothemes = wp_get_theme();
	if ( $ayothemes->exists() ) {
		define( 'CHILD_THEME_NAME', $ayothemes->Name );
		define( 'CHILD_THEME_VERSION', $ayothemes->Version );
	}

	define( 'CHILD_THEME_URL', get_bloginfo( 'url' ) );
	define( 'AYO_SETTINGS_FIELD', 'ayoshop_settings' );
	define( 'AYO_DOMAIN', 'ayoshop' );

	/** Path to child theme lib */
	define( 'CHILD_THEME_LIB_DIR', get_stylesheet_directory().'/lib' );
	define( 'CHILD_THEME_LIB_URL', get_stylesheet_directory_uri().'/lib' );
	/** Path to child theme admin */
	define( 'CHILD_THEME_OPTIONS_DIR', CHILD_THEME_LIB_DIR.'/admin/' );
	define( 'CHILD_THEME_OPTIONS_URL', CHILD_THEME_LIB_URL.'/admin/' );
	/** Path to child theme functions */
	define( 'CHILD_THEME_FUNCTIONS_DIR', CHILD_THEME_LIB_DIR.'/functions/' );
	define( 'CHILD_THEME_FUNCTIONS_URL', CHILD_THEME_LIB_URL.'/functions/' );
	/** Path to child theme widgets */
	define( 'CHILD_THEME_WIDGETS_DIR', CHILD_THEME_LIB_DIR.'/widgets/' );
	define( 'CHILD_THEME_WIDGETS_URL', CHILD_THEME_LIB_URL.'/widgets/' );

	/** 
	 * So we can use is_plugin_active() and is_plugin_inactive()
	 * @link http://codex.wordpress.org/Function_Reference/is_plugin_active
	 */
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	/** Load options framework */
	if ( !function_exists( 'optionsframework_init' ) ) {
		require_once ( CHILD_THEME_OPTIONS_DIR . 'options-framework.php' );
		require_once ( CHILD_THEME_OPTIONS_DIR . 'options.php' );
	}
	
	/** Load child theme functions */
	include( CHILD_THEME_FUNCTIONS_DIR.'theme-functions.php' );
	/** Load child theme tweaks */
	include( CHILD_THEME_FUNCTIONS_DIR.'theme-tweaks.php' );
	/** Load child theme styles */
	include( CHILD_THEME_FUNCTIONS_DIR.'theme-styles.php' );
	/** Load child theme scripts */
	include( CHILD_THEME_FUNCTIONS_DIR.'theme-scripts.php' );
	/** Load child theme structures */
	include( CHILD_THEME_FUNCTIONS_DIR.'theme-structures.php' );

	/** Load child theme widgets */
	include( CHILD_THEME_WIDGETS_DIR.'widgets.php' );

	if ( class_exists( 'WooCommerce' ) ) {
		/** Load child theme scripts */
		include( CHILD_THEME_FUNCTIONS_DIR.'theme-woocommerce.php' );
	}

	if ( class_exists( 'bbPress') ) {
		/** Load child theme scripts */
		include( CHILD_THEME_FUNCTIONS_DIR.'theme-bbpress.php' );
	}
	
	if ( class_exists( 'AQ_Page_Builder' ) ) {
		/** Load Icon Block */
		include( CHILD_THEME_WIDGETS_DIR.'ayo-text-icon.php' );
	}

	if ( class_exists( 'WooCommerce' ) && class_exists( 'AQ_Page_Builder' ) ) {
		/** Load WooCommerce Recent Products Block */
		include( CHILD_THEME_WIDGETS_DIR.'ayo-recent-products.php' );
		/** Load WooCommerce Featured Products Block */
		include( CHILD_THEME_WIDGETS_DIR.'ayo-featured-products.php' );
	}
	
}