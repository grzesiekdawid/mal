<?php

/**
 *  This file control Child theme script
 *
 * @package Ayo
 * @author AyoThemes
 * @since 1.0
 */

if( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'ayo_load_scripts', 15 );
	add_action( 'wp_footer', 'ayo_print_footer_script', 99 );
}

/**
 * Function to control child theme script
 *
 * @since 1.0
 */
function ayo_load_scripts() {

	global $is_IE;
	
	wp_register_script( 'vendor', CHILD_THEME_LIB_URL . '/js/vendor.min.js', 'jquery', CHILD_THEME_VERSION, false );
	wp_register_script( 'flexslider', CHILD_THEME_LIB_URL . '/js/jquery.flexslider-min.js', 'jquery', CHILD_THEME_VERSION, false );
	wp_register_script( 'commentvalidate', CHILD_THEME_LIB_URL. '/js/jquery.validate.pack.js', 'jquery', CHILD_THEME_VERSION, false );	
	
	wp_enqueue_script ( 'jquery' );
	wp_enqueue_script ( 'vendor' );

	if ( is_page_template( 'ayo-homepage-slider.php' ) && !is_active_sidebar( 'ayo-homepage-slider' ) ) {
		wp_enqueue_script ( 'flexslider' );
	}

	if ( ( is_page() && genesis_get_option( 'comments_pages' ) ) || ( is_single() && genesis_get_option( 'comments_posts' ) ) ) {
		wp_enqueue_script ( 'commentvalidate' );
	}
}

/**
 * Function to print scripts at footer
 *
 * @since 1.0
 */
function ayo_print_footer_script() {

	$slider_effect 		= ( of_get_option( 'ayo_slider_effect') == 'slide') ? 'slide' : 'fade' ;
	$slideshow_speed 	= ( of_get_option( 'ayo_slideshow_speed') !=="") ? of_get_option( 'ayo_slideshow_speed') : '7000' ;
	$animation_speed 	= ( of_get_option( 'ayo_animation_speed') !=="") ? of_get_option( 'ayo_animation_speed') : '600' ;

	$output = '';
	
	$output .='jQuery(document).ready(function($){';

	if ( is_page_template( 'ayo-homepage-slider.php' ) && !is_active_sidebar( 'ayo-homepage-slider' ) ) {
	$output .= '
		$(window).load(function() {
			$(".ayo-flexslider").flexslider({
				namespace: "ayo-",
				selector: ".ayo-slides > li",
				slideshowSpeed: '.$slideshow_speed.',
				animationSpeed: '.$animation_speed.',
				pauseOnAction: false,
				pauseOnHover: true,
				smoothHeight: true,
				animation: "'. $slider_effect .'",
				start: function(current){
					$(".slides_content").animate({
					    opacity: 1,
					    bottom: 20
					}, {
					    duration: 500
					});
				},
				before: function(current){
					$(".slides_content").dequeue().animate({
						bottom: 300,
						opacity: 0
					}, 300);
				},
				after: function(current){
					$(".slides_content").dequeue().animate({
					    opacity: 1,
					    bottom: 20
					}, {
					    duration: 500
					});
				},
				end: function(current){
					$(".slides_content").animate({
						bottom: 300,
						opacity: 0
					}, 300);
				}
			});
		});
	';
	}

	if ( of_get_option( 'ayo_enable_responsive' ) ) {

		$output .='
			$(".menu-primary").mobileMenu({
				defaultText: "Select Page",
				className: "menu-primary-mobile",
				subMenuClass: "sub-menu",
				subMenuDash: "&nbsp;&nbsp;&nbsp;"
			});

			$(".menu-secondary").mobileMenu({
				defaultText: "Select Page",
				className: "menu-secondary-mobile",
				subMenuClass: "sub-menu",
				subMenuDash: "&nbsp;&nbsp;&nbsp;"
			});

			$("#header ul.menu").mobileMenu({
				defaultText: "Select Page",
				className: "menu-header-mobile",
				subMenuClass: "sub-menu",
				subMenuDash: "&nbsp;&nbsp;&nbsp;"
			});
		';

	}

	$output .='

		$(".gototop a").click(function() {
			$("html, body").animate({
				scrollTop: $($(this).attr("href")).offset().top + "px"
			}, {
				duration: 500
			});
			return false;
		});
		
		$("#wrap").fitVids();
	';
	
	$output .='});';

	$output .='
		(function(){
			var c = document.body.className;
			c = c.replace(/no-js/, "js");
			document.body.className = c;
		})();
	';
	
	// Output Script
	if ( $output <> '' ) {
		$output = "<!-- Custom Script -->\n<script type='text/javascript'>" .str_replace( array( "\n", "\t", "\r" ), '', $output ). "</script>\n";
		echo $output;
	}

}