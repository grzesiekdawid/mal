<?php

remove_action( 'genesis_before_post_title', 'genesis_do_post_format_image' );
remove_action( 'genesis_post_content', 'genesis_do_post_image' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

add_action( 'genesis_post_content', 'ayo_single_image', 5 );
/** 
 * Image
 * @since 1.0
 */
function ayo_single_image() {
	global $post;
	$image = wp_get_attachment_image_src( $post->ID, 'full' );

	$caption = ( get_the_excerpt() !=="") ? '<p class="wp-caption-text">'. get_the_excerpt() .'</p>' : "";

	echo '<div class="wp-caption aligncenter" style="width:'.$image[1].'px">'. genesis_get_image( array( 'format' => 'html', 'size' => 'full') ) .''. $caption .'</div>';
}

genesis();