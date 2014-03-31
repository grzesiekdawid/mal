<?php

/**
 * This file controls all part of WordPress and Genesis Framework functionality tweaks
 *
 * @package Ayo
 * @author AyoThemes
 */


/** Translation and localization */
load_child_theme_textdomain( 'ayo', get_stylesheet_directory().'/languages' );
$locale = get_locale();
$locale_file = get_stylesheet_directory() . '/languages' . "/$locale.php";
if ( is_readable( $locale_file ) )
    require_once( $locale_file );

/** Genesis Connect Woocommerce */
add_theme_support( 'genesis-connect-woocommerce' );


/** BbPress */
add_theme_support( 'bbpress' );


// Add Editor style
add_editor_style( 'editor-style.css' );


add_action( 'genesis_admin_before_metaboxes', 'ayo_remove_genesis_theme_metaboxes' );
/**
 * Remove selected Genesis metaboxes from the Theme Settings pages.
 *
 * @param string $hook The unique pagehook for the Genesis settings page
 */
function ayo_remove_genesis_theme_metaboxes( $hook ) {

	remove_meta_box( 'genesis-theme-settings-header', 	$hook, 'main' );

}

/** WordPress Custom Header */
// add_theme_support( 'custom-header' );
/** WordPress Custom Background */
//add_theme_support( 'custom-background' );

/** ayo shop image size */
if( function_exists('add_theme_support') ) {
	add_image_size( 'ayo-thumbnail', 64, 64, true );
	add_image_size( 'ayo-featured', 700, 380, true );
	add_image_size( 'ayo-slider', 1000, 520, true );
}

/** genesis-structural-wrap */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Move genesis_do_nav into genesis_before_header */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

/** Genesis Footer Widgets #4 */
add_theme_support( 'genesis-footer-widgets', 4 );

/** Too many layout */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
/** Unregister sidebar area */
unregister_sidebar( 'sidebar-alt' );

if ( of_get_option( 'ayo_favicon' ) ) {
	remove_action( 'genesis_meta', 'genesis_load_favicon' );
	add_action( 'genesis_meta', 'ayo_load_favicon');
}
/**
 * Echo the post meta after the post content.
 *
 * @since 1.0
 */
function ayo_load_favicon(){
	echo '<link rel="Shortcut Icon" href="' . esc_url( of_get_option('ayo_favicon') ) . '" type="image/x-icon" />' . "\n";
}

add_action( 'genesis_meta', 'ayo_viewport_meta', 5 );
/**
 * Add responsive meta tags
 *
 * @since 1.0
 */
function ayo_viewport_meta() {
	$output  = '';
	$output .= "\n<!-- adding google chrome frame support -->\n";
	$output .= "<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>\n";
	$output .= "<!-- mobile meta -->\n";
	$output .= "<meta name='HandheldFriendly 'content='True>'\n";
	$output .= "<meta name='MobileOptimized 'content='320'>\n";
	$output .= "<meta name='viewport'content='width=device-width, initial-scale=1.0'/>\n";
	
	if ( of_get_option( 'ayo_enable_responsive' ) && $output <> '' ) {
		echo $output;
	}
}


/**
 * Some Front page need H1 tags for the title
 * 
 * @since 1.0
 */
function frontpage_site_title( $wrap ){
	/** Set what goes inside the wrapping tags */
	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), get_bloginfo( 'name' ) );

	/** Determine which wrapping tags to use */
	$wrap = is_home() || is_page_template( 'ayo-homepage.php' ) || is_page_template( 'ayo-homepage-slider.php' ) && 'title' == genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';

	/** A little fallback, in case an SEO plugin is active */
	$wrap = is_home() || is_page_template( 'ayo-homepage.php' ) || is_page_template( 'ayo-homepage-slider.php' ) && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;

	$title = sprintf( '<%s id="title">%s</%s>', $wrap, $inside, $wrap );

	return $title;
}

remove_action( 'genesis_before_post_content', 'genesis_post_info' );
add_filter( 'ayo_post_info', 'do_shortcode', 20 );
add_action( 'genesis_before_post_content', 'ayo_post_info' );
/**
 * Echo the post info (byline) under the post title.
 * 
 * @since 1.0
 */
function ayo_post_info() {

	if ( function_exists( 'is_bbpress' ) ){
		if ( is_bbpress() )
			return;
	}	

	global $post;

	if ( is_page( $post->ID ) )
		return;

	$post_info = '[post_date before="<i class=\'ayoicon icon-calendar\'></i>"] [post_author_posts_link  before="<i class=\'ayoicon icon-user\'></i>"] [post_comments before="<i class=\'ayoicon icon-comments\'></i>"] [post_edit]';
	printf( '<div class="post-info">%s</div>', apply_filters( 'ayo_post_info', $post_info ) );

}

remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
add_filter( 'ayo_post_meta', 'do_shortcode', 20 );
add_action( 'genesis_after_post_content', 'ayo_post_meta' );
/**
 * Echo the post meta after the post content.
 *
 * @since 1.0
 */
function ayo_post_meta() {

	if ( function_exists( 'is_bbpress' ) ){
		if ( is_bbpress() )
			return;
	}		

	global $post;

	if ( is_page( $post->ID ) )
		return;

	$post_meta = '[post_categories before="<i class=\'ayoicon icon-folder-open\'></i>"] [post_tags before="<i class=\'ayoicon icon-tags\'></i>"]';
	printf( '<div class="post-meta">%s</div>', apply_filters( 'ayo_post_meta', $post_meta ) );

}

add_filter( 'genesis_breadcrumb_args', 'ayo_breadcrumb_args' );
/**
 * Function to filter Genesis Breadcrumb
 *
 * @since 1.0
 */
function ayo_breadcrumb_args( $args ) {
	$args['home']                    = 'Home';
	$args['sep']                     = ' / ';
	$args['list_sep']                = ', '; // Genesis 1.5 and later
	$args['prefix']                  = '<div class="breadcrumb"><span>';
	$args['suffix']                  = '</span></div>';
	$args['heirarchial_attachments'] = true; // Genesis 1.5 and later
	$args['heirarchial_categories']  = true; // Genesis 1.5 and later
	$args['display']                 = true;
	$args['labels']['prefix']        = ' ';
	$args['labels']['author']        = ' ';
	$args['labels']['category']      = ' '; // Genesis 1.6 and later
	$args['labels']['tag']           = ' ';
	$args['labels']['date']          = ' ';
	$args['labels']['search']        = ' ';
	$args['labels']['tax']           = ' ';
	$args['labels']['post_type']     = ' ';
	$args['labels']['404']           = ' '; // Genesis 1.5 and later
	return $args;
}

add_filter( 'the_content', 'ayo_filter_ptags_on_images' );
/** 
 * This function remove the p from around imgs.
 * @see http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images
 * 
 * @since 1.0 
 */
function ayo_filter_ptags_on_images( $content ){
   return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}

add_filter( 'gallery_style', 'ayo_gallery_style' );
/** 
 * Remove default style from wp gallery shortcode
 * @since 1.0 
 */
function ayo_gallery_style( $css ) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

add_filter( 'embed_oembed_html', 'ayo_oembed_transparency', 10, 4 );
/**
 * oEmbed Transparency
 *
 * Used so that menus can appear on top of videos
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/oembed-transparency
 *
 * @param string $html
 * @param string $url
 * @param array $attr, shortcode attributes
 * @param int $post_id
 * @return string The embed HTML on success, otherwise the original URL.
 * 
 * @since 1.0
 */
function ayo_oembed_transparency( $html, $url, $attr, $post_id ) {
	if ( strpos( $html, "<embed src=" ) !== false )
		return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html);
	elseif ( strpos ( $html, 'feature=oembed' ) !== false )
		return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html );
	else
		return $html;
}

add_filter( 'oembed_result', 'twitter_no_width', 10, 3 );
function twitter_no_width($html, $url, $args) {
    if (false !== strpos($url, 'twitter.com')) {
        $html = str_replace('width="550"','',$html);
    }
    return $html;
}

add_filter( 'body_class','ayo_body_class' );
/** 
 * Function to add additional body class
 * 
 * @since 1.0 
 */
function ayo_body_class( $classes ) {

	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);
		if ($browser == "MSIE 7.0"  ) {
			$classes[] = 'ie7';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 6.0" ) {
			$classes[] = 'ie6';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 8.0" ) {
			$classes[] = 'ie8';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 9.0" ) {
			$classes[] = 'ie9';
			$classes[] = 'ie';
		} else {
			$classes[] = 'ie';
		}
	}
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';

	$classes[] = 'no-js';

	if ( !genesis_get_option( 'nav' ) ){
		$classes[] = 'no-nav';
	}

	if ( !genesis_get_option( 'subnav' ) ){
		$classes[] = 'no-subnav';
	}

	if ( of_get_option( 'ayo_image_logo' ) ) {
		$classes[] = 'header-image';
	}
		
	return $classes;

}

add_action( 'genesis_after_post_content', 'ayo_single_post_nav', 15 );

function ayo_single_post_nav(){
	
	global $post;

	if ( function_exists( 'is_bbpress' ) ){
		if ( is_bbpress() )
			return;
	}
		
	if ( is_single() && ! is_attachment() ) {
	?>
    <div class="post-nav clearfix">
		<div class="prev-post-nav">
			<?php previous_post_link('%link', '<i class="icon-chevron-left"></i> %title'); if(!get_adjacent_post(false, '', true)) { echo '<i class="icon-chevron-left"></i>'.__('No Post Found','ayo'); } ?>
		</div>
		<div class="next-post-nav">
			<?php if( !get_adjacent_post(false, '', false) ) { echo __( 'No Post Found', 'ayo' ).' <i class="icon-chevron-right"></i>'; } next_post_link('%link', '%title <i class="icon-chevron-right"></i>'); ?>
		</div>
    </div>
	<?php } elseif ( is_attachment() ) {
	    echo '<div class="post-nav nav-attachment clearfix">';
		echo previous_image_link( false, '<div class="prev-post-nav"><i class="icon-chevron-left"></i>'. __( 'Previous', 'ayo' ) .'</div>');
		echo next_image_link( false, '<div class="next-post-nav">'. __( 'Next', 'ayo' ) .'<i class="icon-chevron-right"></i></div>');
	    echo '</div>';
	}

}

// Back to top button
add_action( 'genesis_footer', 'ayo_return_to_top', 5 );
function ayo_return_to_top(){
	echo '<div class="gototop"><a href="#wrap" title="'.__( 'Return to top of page', 'genesis' ).'"><i class="icon-chevron-up"></i></a></div>';	
}

add_filter( 'genesis_footer_output', 'ayo_footer_output_filter', 10, 3 );
/** 
 * Footer text
 * 
 * @since 1.0 
 */
function ayo_footer_output_filter($output, $creds_text) {
	
	$creds_text = wpautop( of_get_option( 'ayo_footer_copyright' ) );
	$output = '<div class="creds">' . $creds_text . '</div>';
	
	return $output;
}

add_action( 'genesis_footer', 'ayo_footer_widget' );
function ayo_footer_widget(){
	if ( is_active_sidebar( 'ayo-footer-widget' ) ) {
		dynamic_sidebar( 'ayo-footer-widget' );
	}
}

add_filter( 'widget_tag_cloud_args', 'ayo_widget_tag_cloud_args' );
/** 
 * Widget Tag clound edit
 * 
 * @since 1.0 
 */
function ayo_widget_tag_cloud_args( $args ) {
	$args['largest'] = 0.875;
	$args['smallest'] = 0.875;
	$args['unit'] = 'em';
	return $args;
}

add_filter( 'http_request_args', 'ayothemes_dont_update_theme', 5, 2 );
/** 
 * Don't update theme from WordPress Theme Repository
 * 
 * @see http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 * @since 1.0 
 */
function ayothemes_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}

add_filter( 'the_password_form', 'ayo_post_password');
/** 
 * Filter Password protection content form, give additional markup
 * 
 * @since 1.0 
 */
function ayo_post_password(){
	global $post;
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<div class="ayo_post_password"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	<p>' . __("This post is password protected. To view it please enter your password below:") . '</p>
	<p><label for="' . $label . '">' . __("Password:") . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . esc_attr__("Submit") . '" /></p>
</form></div>
	';
	return $output;
}

add_filter( 'attachment_fields_to_save', '_save_attachment_url', 10, 2 );
/** 
 * Allow Media to save custom url
 * 
 * @see http://wordpress.stackexchange.com/questions/14773/retrieving-a-custom-link-on-an-attachment
 */
function _save_attachment_url( $post, $attachment ) {
    if ( isset( $attachment['url'] ) ) 
        update_post_meta( $post['ID'], '_wp_attachment_url', esc_url_raw( $attachment['url'] ) ); 
    return $post;
}


add_filter( 'attachment_fields_to_edit', '_replace_attachment_url', 10, 2 );
/** 
 * Allow Media to save custom url
 * 
 * @see http://wordpress.stackexchange.com/questions/14773/retrieving-a-custom-link-on-an-attachment
 */
function _replace_attachment_url( $form_fields, $post ) {
    if ( isset( $form_fields['url']['html'] ) ) {
        $url = get_post_meta( $post->ID, '_wp_attachment_url', true );
        if ( ! empty( $url ) )
            $form_fields['url']['html'] = preg_replace( "/value='.*?'/", "value='$url'", $form_fields['url']['html'] );
    }
    return $form_fields;
}

add_action( 'wp_head', 'tgm_tame_disqus_comments' );
/**
 * Tames DISQUS comments so that it only outputs JS on specified
 * pages in the site.
 * 
 * @since 1.0
 */
function tgm_tame_disqus_comments() {
	
	if ( class_exists( 'DisqusWordPressAPI') ) {
		/** If we are viewing a single post or page and have comments available, we need the code, so return early */
		if ( is_singular( array( 'post', 'page' ) ) && comments_open() )
			return;

		/** Tame Disqus from outputting JS on pages where comments are not available */
		remove_action( 'loop_end', 'dsq_loop_end' );
		remove_action( 'wp_footer', 'dsq_output_footer_comment_js' );
	}

}

add_action( 'wp_enqueue_scripts', 'unregister_default_wpcf7_styles' );
/** 
 * Disable default WPCF7 stylesheet
 * 
 * @since 1.1
 */
function unregister_default_wpcf7_styles(){

	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {

		wp_dequeue_style( 'contact-form-7' );

	}

}