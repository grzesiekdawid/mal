<?php
/**
 * 
 * Template Name: Homepage
 * 
 */

add_action( 'genesis_meta', 'ayo_homepage' );

function ayo_homepage(){

	remove_action( 'genesis_before_post_title', 'genesis_do_post_format_image' );
	remove_action( 'genesis_post_title', 'genesis_do_post_title' );
	remove_action( 'genesis_post_content', 'genesis_do_post_image' );
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

	add_filter( 'genesis_seo_title', 'frontpage_site_title' );
	
	// Not sure
	// add_action( 'genesis_loop', 'ayo_slider_content', 5 );
}

genesis();