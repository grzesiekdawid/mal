<?php
/**
 * 
 * Template Name: Homepage Slider
 * 
 */

add_action( 'genesis_meta', 'ayo_homepage_slider' );

function ayo_homepage_slider(){
	
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	add_action( 'genesis_loop', 'ayo_slider_content', 5 );
	add_action( 'genesis_loop', 'ayo_homepage_content_loop', 5 );

	add_filter( 'genesis_seo_title', 'frontpage_site_title' );

}

genesis();