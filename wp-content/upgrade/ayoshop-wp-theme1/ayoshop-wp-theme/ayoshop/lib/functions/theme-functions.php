<?php

/**
 * This file controls all part of custom functions / library
 *
 * 	@package AyoShop
 * 	@author AyoThemes
 *  @since 1.0
 */


/** 
 * This file contain numbers in an array
 * 
 * @since 0.1
 */
function ayo_number_array() {
	$number = range( 0, 60 );
	$number = array_map( 'absint', $number );
	return $number;
}

/**
 * This function is an array for listing font-awesome classes
 *
 * @since 0.1
 */
function ayo_font_awesome_array(){

	$ayo_font_awesome_array = array(
		"icon-glass"				=>	"glass",
		"icon-music"				=>	"music",
		"icon-search"				=>	"search",
		"icon-envelope"				=>	"envelope",
		"icon-heart"				=>	"heart",
		"icon-star"					=>	"star",
		"icon-star-empty"			=>	"star-empty",
		"icon-user"					=>	"user",
		"icon-film"					=>	"film",
		"icon-th-large"				=>	"th-large",
		"icon-th"					=>	"th",
		"icon-th-list"				=>	"th-list",
		"icon-ok"					=>	"ok",
		"icon-remove"				=>	"remove",
		"icon-zoom-in"				=>	"zoom-in",
		"icon-zoom-out"				=>	"zoom-out",
		"icon-off"					=>	"off",
		"icon-signal"				=>	"signal",
		"icon-cog"					=>	"cog",
		"icon-trash"				=>	"trash",
		"icon-home"					=>	"home",
		"icon-file"					=>	"file",
		"icon-time"					=>	"time",
		"icon-road"					=>	"road",
		"icon-download-alt"			=>	"download-alt",
		"icon-download"				=>	"download",
		"icon-upload"				=>	"upload",
		"icon-inbox"				=>	"inbox",
		"icon-play-circle"			=>	"play-circle",
		"icon-repeat"				=>	"repeat",
		"icon-refresh"				=>	"refresh",
		"icon-list-alt"				=>	"list-alt",
		"icon-lock"					=>	"lock",
		"icon-flag"					=>	"flag",
		"icon-headphones"			=>	"headphones",
		"icon-volume-off"			=>	"volume-off",
		"icon-volume-down"			=>	"volume-down",
		"icon-volume-up"			=>	"volume-up",
		"icon-qrcode"				=>	"qrcode",
		"icon-barcode"				=>	"barcode",
		"icon-tag"					=>	"tag",
		"icon-tags"					=>	"tags",
		"icon-book"					=>	"book",
		"icon-bookmark"				=>	"bookmark",
		"icon-print"				=>	"print",
		"icon-camera"				=>	"camera",
		"icon-font"					=>	"font",
		"icon-bold"					=>	"bold",
		"icon-italic"				=>	"italic",
		"icon-text-height"			=>	"text-height",
		"icon-text-width"			=>	"text-width",
		"icon-align-left"			=>	"align-left",
		"icon-align-center"			=>	"align-center",
		"icon-align-right"			=>	"align-right",
		"icon-align-justify"		=>	"align-justify",
		"icon-list"					=>	"list",
		"icon-indent-left"			=>	"indent-left",
		"icon-indent-right"			=>	"indent-right",
		"icon-facetime-video"		=>	"facetime-video",
		"icon-picture"				=>	"picture",
		"icon-pencil"				=>	"pencil",
		"icon-map-marker"			=>	"map-marker",
		"icon-adjust"				=>	"adjust",
		"icon-tint"					=>	"tint",
		"icon-edit"					=>	"edit",
		"icon-share"				=>	"share",
		"icon-check"				=>	"check",
		"icon-move"					=>	"move",
		"icon-step-backward"		=>	"step-backward",
		"icon-fast-backward"		=>	"fast-backward",
		"icon-backward"				=>	"backward",
		"icon-play"					=>	"play",
		"icon-pause"				=>	"pause",
		"icon-stop"					=>	"stop",
		"icon-forward"				=>	"forward",
		"icon-fast-forward"			=>	"fast-forward",
		"icon-step-forward"			=>	"step-forward",
		"icon-eject"				=>	"eject",
		"icon-chevron-left"			=>	"chevron-left",
		"icon-chevron-right"		=>	"chevron-right",
		"icon-plus-sign"			=>	"plus-sign",
		"icon-minus-sign"			=>	"minus-sign",
		"icon-remove-sign"			=>	"remove-sign",
		"icon-ok-sign"				=>	"ok-sign",
		"icon-question-sign"		=>	"question-sign",
		"icon-info-sign"			=>	"info-sign",
		"icon-screenshot"			=>	"screenshot",
		"icon-remove-circle"		=>	"remove-circle",
		"icon-ok-circle"			=>	"ok-circle",
		"icon-ban-circle"			=>	"ban-circle",
		"icon-arrow-left"			=>	"arrow-left",
		"icon-arrow-right"			=>	"arrow-right",
		"icon-arrow-up"				=>	"arrow-up",
		"icon-arrow-down"			=>	"arrow-down",
		"icon-share-alt"			=>	"share-alt",
		"icon-resize-full"			=>	"resize-full",
		"icon-resize-small"			=>	"resize-small",
		"icon-plus"					=>	"plus",
		"icon-minus"				=>	"minus",
		"icon-asterisk"				=>	"asterisk",
		"icon-exclamation-sign"		=>	"exclamation-sign",
		"icon-gift"					=>	"gift",
		"icon-leaf"					=>	"leaf",
		"icon-fire"					=>	"fire",
		"icon-eye-open"				=>	"eye-open",
		"icon-eye-close"			=>	"eye-close",
		"icon-warning-sign"			=>	"warning-sign",
		"icon-plane"				=>	"plane",
		"icon-calendar"				=>	"calendar",
		"icon-random"				=>	"random",
		"icon-comment"				=>	"comment",
		"icon-magnet"				=>	"magnet",
		"icon-chevron-up"			=>	"chevron-up",
		"icon-chevron-down"			=>	"chevron-down",
		"icon-retweet"				=>	"retweet",
		"icon-shopping-cart"		=>	"shopping-cart",
		"icon-folder-close"			=>	"folder-close",
		"icon-folder-open"			=>	"folder-open",
		"icon-resize-vertical"		=>	"resize-vertical",
		"icon-resize-horizontal"	=>	"resize-horizontal",
		"icon-bar-chart"			=>	"bar-chart",
		"icon-twitter-sign"			=>	"twitter-sign",
		"icon-facebook-sign"		=>	"facebook-sign",
		"icon-camera-retro"			=>	"camera-retro",
		"icon-key"					=>	"key",
		"icon-cogs"					=>	"cogs",
		"icon-comments"				=>	"comments",
		"icon-thumbs-up"			=>	"thumbs-up",
		"icon-thumbs-down"			=>	"thumbs-down",
		"icon-star-half"			=>	"star-half",
		"icon-heart-empty"			=>	"heart-empty",
		"icon-signout"				=>	"signout",
		"icon-linkedin-sign"		=>	"linkedin-sign",
		"icon-pushpin"				=>	"pushpin",
		"icon-external-link"		=>	"external-link",
		"icon-signin"				=>	"signin",
		"icon-trophy"				=>	"trophy",
		"icon-github-sign"			=>	"github-sign",
		"icon-upload-alt"			=>	"upload-alt",
		"icon-lemon"				=>	"lemon",
		"icon-phone"				=>	"phone",
		"icon-check-empty"			=>	"check-empty",
		"icon-bookmark-empty"		=>	"bookmark-empty",
		"icon-phone-sign"			=>	"phone-sign",
		"icon-twitter"				=>	"twitter",
		"icon-facebook"				=>	"facebook",
		"icon-github"				=>	"github",
		"icon-unlock"				=>	"unlock",
		"icon-credit-card"			=>	"credit-card",
		"icon-rss"					=>	"rss",
		"icon-hdd"					=>	"hdd",
		"icon-bullhorn"				=>	"bullhorn",
		"icon-bell"					=>	"bell",
		"icon-certificate"			=>	"certificate",
		"icon-hand-right"			=>	"hand-right",
		"icon-hand-left"			=>	"hand-left",
		"icon-hand-up"				=>	"hand-up",
		"icon-hand-down"			=>	"hand-down",
		"icon-circle-arrow-left"	=>	"circle-arrow-left",
		"icon-circle-arrow-right"	=>	"circle-arrow-right",
		"icon-circle-arrow-up"		=>	"circle-arrow-up",
		"icon-circle-arrow-down"	=>	"circle-arrow-down",
		"icon-globe"				=>	"globe",
		"icon-wrench"				=>	"wrench",
		"icon-tasks"				=>	"tasks",
		"icon-filter"				=>	"filter",
		"icon-briefcase"			=>	"briefcase",
		"icon-fullscreen"			=>	"fullscreen",
		"icon-group"				=>	"group",
		"icon-link"					=>	"link",
		"icon-cloud"				=>	"cloud",
		"icon-beaker"				=>	"beaker",
		"icon-cut"					=>	"cut",
		"icon-copy"					=>	"copy",
		"icon-paper-clip"			=>	"paper-clip",
		"icon-save"					=>	"save",
		"icon-sign-blank"			=>	"sign-blank",
		"icon-reorder"				=>	"reorder",
		"icon-list-ul"				=>	"list-ul",
		"icon-list-ol"				=>	"list-ol",
		"icon-strikethrough"		=>	"strikethrough",
		"icon-underline"			=>	"underline",
		"icon-table"				=>	"table",
		"icon-magic"				=>	"magic",
		"icon-truck"				=>	"truck",
		"icon-pinterest"			=>	"pinterest",
		"icon-pinterest-sign"		=>	"pinterest-sign",
		"icon-google-plus-sign"		=>	"google-plus-sign",
		"icon-google-plus"			=>	"google-plus",
		"icon-money"				=>	"money",
		"icon-caret-down"			=>	"caret-down",
		"icon-caret-up"				=>	"caret-up",
		"icon-caret-left"			=>	"caret-left",
		"icon-caret-right"			=>	"caret-right",
		"icon-columns"				=>	"columns",
		"icon-sort"					=>	"sort",
		"icon-sort-down"			=>	"sort-down",
		"icon-sort-up"				=>	"sort-up",
		"icon-envelope-alt"			=>	"envelope-alt",
		"icon-linkedin"				=>	"linkedin",
		"icon-undo"					=>	"undo",
		"icon-legal"				=>	"legal",
		"icon-dashboard"			=>	"dashboard",
		"icon-comment-alt"			=>	"comment-alt",
		"icon-comments-alt"			=>	"comments-alt",
		"icon-bolt"					=>	"bolt",
		"icon-sitemap"				=>	"sitemap",
		"icon-umbrella"				=>	"umbrella",
		"icon-paste"				=>	"paste",
		"icon-user-md"				=>	"user-md",
	);

	asort( $ayo_font_awesome_array );
	return apply_filters( 'ayo_font_awesome_array', $ayo_font_awesome_array );
}

/**
 * Organize web safe fonts into an array
 *
 * @since 0.1
 */
function ayo_websafe_fonts(){

	$ayo_websafe_fonts = array(
		'Arial, Helvetica, sans-serif'							=> 'Arial',
		'"Arial Black", Gadget, sans-serif'						=> 'Arial Black',
		'"Comic Sans MS", cursive, sans-serif'					=> 'Comic Sans MS',
		'"Courier New", Courier, monospace'						=> 'Courier New',
		'Georgia, serif'										=> 'Georgia',
		'Impact, Charcoal, sans-serif'							=> 'Impact',
		'"Lucida Console", Monaco, monospace'					=> 'Lucida Console',
		'"Lucida Sans Unicode", "Lucida Grande", sans-serif'	=> 'Lucida Sans Unicode',
		'"Palatino Linotype", "Book Antiqua", Palatino, serif'	=> 'Palatino Linotype',
		'Tahoma, Geneva, sans-serif'							=> 'Tahoma',
		'"Times New Roman", Times, serif'						=> 'Times New Roman',
		'"Trebuchet MS", Helvetica, sans-serif'					=> 'Trebuchet MS',
		'Verdana, Geneva, sans-serif'							=> 'Verdana',
	);

	return apply_filters( 'ayo_websafe_fonts', $ayo_websafe_fonts);

}

/** 
 * Organize Google webfonts into an array
 * 
 * @since 0.1
 */
function ayo_google_webfonts(){

	$ayo_google_webfonts = array(
		'Arvo'					=> 'Arvo',
		'Bitter'				=> 'Bitter',
		'Open Sans'				=> 'Open Sans',
		'Droid Sans'			=> 'Droid Sans',
		'Droid Serif'			=> 'Droid Serif',
		'Francois One'			=> 'Francois One',
		'Lato'					=> 'Lato',
		'Lobster'				=> 'Lobster',
		'Lora'					=> 'Lora',
		'Nunito'				=> 'Nunito',
		'Oswald'				=> 'Oswald',
		'PT Sans'				=> 'PT Sans',
		'PT Sans Narrow'		=> 'PT Sans Narrow',
		'Ubuntu'				=> 'Ubuntu',
		'Yanone Kaffeesatz'		=> 'Yanone Kaffeesatz',
	);

	return apply_filters( 'ayo_google_webfonts', $ayo_google_webfonts );

}

/** 
 * Marge all fonts into an array
 * 
 * @since 0.1
 */
function ayo_mixin_fonts(){

	$ayo_mixin_fonts = array_merge( ayo_websafe_fonts(), ayo_google_webfonts() );
	return $ayo_mixin_fonts;

}


/** 
 * This is helper class to get attachment ID based on img src
 * 
 * @see http://wordpress.org/support/topic/need-to-get-attachment-id-by-image-url
 */
function get_attachment_id_from_src( $url ) {

	global $wpdb;
	$id = url_to_postid( $url );
	if( $id == 0 ) {
		$fileupload_url = get_option( 'fileupload_url', null ).'/';
		if ( strpos($url,$fileupload_url)!== false ) {
			$url = str_replace( $fileupload_url,'',$url );
			$id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $url ) );
		}
	}
	return $id;

}

/**
 * Quick and dirty way to mostly minify CSS.
 *
 * @since 1.0.0
 * @author Gary Jones
 * @link https://github.com/GaryJones/Simple-PHP-CSS-Minification
 * @param string $css CSS to minify
 * @return string Minified CSS
 */
function minify( $css ) {
	// Normalize whitespace
	$css = preg_replace( '/\s+/', ' ', $css );
	// Remove comment blocks, everything between /* and */, unless
	// preserved with /*! ... */
	$css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
	// Remove space after , : ; { }
	$css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
	// Remove space before , ; { }
	$css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
	// Strips leading 0 on decimal values (converts 0.5px into .5px)
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	// Strips units if value is 0 (converts 0px to 0)
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	// Converts all zeros value into short-hand
	$css = preg_replace( '/0 0 0 0/', '0', $css );
	// Shortern 6-character hex color codes to 3-character where possible
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );
	return trim( $css );
}

/**
* Title		: Aqua Resizer
* Description	: Resizes WordPress images on the fly
* Version	: 1.1.6
* Author	: Syamil MJ
* Author URI	: http://aquagraphite.com
* License	: WTFPL - http://sam.zoy.org/wtfpl/
* Documentation	: https://github.com/sy4mil/Aqua-Resizer/
*
* @param	string $url - (required) must be uploaded using wp media uploader
* @param	int $width - (required)
* @param	int $height - (optional)
* @param	bool $crop - (optional) default to soft crop
* @param	bool $single - (optional) returns an array if false
* @uses		wp_upload_dir()
* @uses		image_resize_dimensions() | image_resize()
* @uses		wp_get_image_editor()
*
* @return str|array
*/

function aq_resize( $url, $width, $height = null, $crop = null, $single = true ) {

	//validate inputs
	if(!$url OR !$width ) return false;

	//define upload path & dir
	$upload_info = wp_upload_dir();
	$upload_dir = $upload_info['basedir'];
	$upload_url = $upload_info['baseurl'];

	//check if $img_url is local
	if(strpos( $url, $upload_url ) === false) return false;

	//define path of image
	$rel_path = str_replace( $upload_url, '', $url);
	$img_path = $upload_dir . $rel_path;

	//check if img path exists, and is an image indeed
	if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

	//get image info
	$info = pathinfo($img_path);
	$ext = $info['extension'];
	list($orig_w,$orig_h) = getimagesize($img_path);

	//get image size after cropping
	$dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
	$dst_w = $dims[4];
	$dst_h = $dims[5];

	//use this to check if cropped image already exists, so we can return that instead
	$suffix = "{$dst_w}x{$dst_h}";
	$dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
	$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

	if(!$dst_h) {
		//can't resize, so return original url
		$img_url = $url;
		$dst_w = $orig_w;
		$dst_h = $orig_h;
	}
	//else check if cache exists
	elseif(file_exists($destfilename) && getimagesize($destfilename)) {
		$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
	} 
	//else, we resize the image and return the new resized image url
	else {

		// Note: This pre-3.5 fallback check will edited out in subsequent version
		if(function_exists('wp_get_image_editor')) {

			$editor = wp_get_image_editor($img_path);

			if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
				return false;

			$resized_file = $editor->save();

			if(!is_wp_error($resized_file)) {
				$resized_rel_path = str_replace( $upload_dir, '', $resized_file['path']);
				$img_url = $upload_url . $resized_rel_path;
			} else {
				return false;
			}

		} else {

			$resized_img_path = image_resize( $img_path, $width, $height, $crop ); // Fallback foo
			if(!is_wp_error($resized_img_path)) {
				$resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
				$img_url = $upload_url . $resized_rel_path;
			} else {
				return false;
			}

		}

	}

	//return the output
	if($single) {
		//str return
		$image = $img_url;
	} else {
		//array return
		$image = array (
			0 => $img_url,
			1 => $dst_w,
			2 => $dst_h
		);
	}

	return $image;
}

add_shortcode( 'icon', 'ayo_fontawesome_shortcode' );
/**
 * I dont like put shortcode at theme actually
 * 	
 * @since 1.0
 */
function ayo_fontawesome_shortcode( $attr ) {

	$defaults = array(
		'type'  => 'icon-adjust',
		'color' => '#444',
		'size'	=> '16',
	);

	$attr = shortcode_atts( $defaults, $attr );

	$output = sprintf( '<i class="%s" style="color:%s; font-size:%dpx">&nbsp;</i>', $attr['type'], $attr['color'], $attr['size'] );

    return apply_filters( 'ayo_fontawesome_shortcode', $output, $attr );

}