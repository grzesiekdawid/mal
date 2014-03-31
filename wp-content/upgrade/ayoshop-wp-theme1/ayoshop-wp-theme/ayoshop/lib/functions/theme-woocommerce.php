<?php
/**
 * This file controls all part of WooCommerce Tweaks
 *
 * @package Ayo Shop
 * @author AyoThemes
 * @since 1.0
 */

add_action( 'admin_notices', 'ayo_gcwc_notification' );
/** 
 * Make it sure to install 'Genesis Connect for WooCommerce' if using WooCommerce plugin
 * 
 * @since 1.0 
 */
function ayo_gcwc_notification(){

	if ( class_exists( 'Woocommerce' ) && is_plugin_active( 'genesis-connect-woocommerce/genesis-connect-woocommerce.php' ) ) {
    	return;
	} elseif ( class_exists( 'Woocommerce' ) && is_plugin_inactive( 'genesis-connect-woocommerce/genesis-connect-woocommerce.php' ) ) {
		echo '<div class="updated"><p>'.sprintf( __( 'One more step to make %s compatible with WooCommerce. Please <b>install</b> and <b>activate</b> <a href="%s" target="_blank">Genesis Connect for WooCommerce</a> plugin.', 'ayo' ), CHILD_THEME_NAME,  'http://wordpress.org/extend/plugins/genesis-connect-woocommerce/' ).'</p></div>';
	}

}


/* Disable default Woocommerce CSS */
define( 'WOOCOMMERCE_USE_CSS', false );


add_action( 'genesis_header', 'ayo_woocommerce_meta' );
/** 
 * Function to show shop meta
 * <!--MFUNC --><!--/mfunc --> didnt work for W3 Total Cache
 * 
 * @since 1.0 
 */
function ayo_woocommerce_meta() {	
	global $woocommerce;

	if ( of_get_option( 'ayo_gw_meta' ) == 1 ) {

		if ( is_plugin_inactive( 'w3-total-cache/w3-total-cache.php' ) ) {
		?>
				<ul class="ayo_wc_meta">
					<li class="ayo_wc_user"><!--MFUNC --><?php echo ayo_user_login(); ?><!--/mfunc --></li>
					<li><i class="icon-shopping-cart"></i><!--MFUNC --><?php echo current( woocommerce_cart_link() );?><!--/mfunc --></li>
				</ul>
			<?php
		} else {
		?>
			<ul class="ayo_wc_meta">
				<li class="ayo_wc_user"><?php echo ayo_user_login(); ?></li>
				<li><i class="icon-shopping-cart"></i><?php echo current( woocommerce_cart_link() );?></li>
			</ul>
		<?php
		}

	}

}


/** 
 * WooCommerce User login
 * 
 * @since 1.0 
 */
function ayo_user_login(){
	global $woocommerce;

	$output ='';

	if ( is_user_logged_in() ) {
		$output .='<i class="icon-user"></i><a class="ayo_user_log" href="'. esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) .'" title="'. __( 'My Account','ayo' ).'">'.__( 'My Account', 'ayo' ).'</a>';
	} else{
		$output .='<i class="icon-lock"></i><a class="ayo_user_account" href="'. esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ).'" title="'. __( 'Customer login','ayo').'">'.__( 'Customer login', 'ayo' ).'</a>';
	}

	return $output;
}


add_filter( 'add_to_cart_fragments', 'woocommerce_cart_link' );
/** 
 * Function to show shop meta
 * 
 * @since 1.0 
 */
function woocommerce_cart_link() {
	global $woocommerce;
	
	$cart_count = esc_attr($woocommerce->cart->cart_contents_count);
	$cart_counts = ( $cart_count <= 1 ) ? sprintf( __( '%d item', 'ayo'), $cart_count ) : sprintf( __( '%d items', 'ayo'), $cart_count ) ;
	ob_start();

	?>
	<a class="woo_items" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php echo $cart_counts; ?> <?php _e( 'in your shopping cart', 'ayo' ); ?>" class="cart-button ">
		<?php echo $cart_counts;?> - <?php echo $woocommerce->cart->get_cart_total();  ?>
	</a>
	<?php	
	$fragments['a.woo_items'] = ob_get_clean();	
	return $fragments;
}

/** 
 * Change number or products per row based on Genesis layout
 * 
 * @since 1.0 
 */
if ( of_get_option( 'ayo_shop_loop' ) ) {
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.of_get_option( 'ayo_shop_loop' ).';') );
}

add_filter( 'loop_shop_columns', 'ayo_shop_columns' );
/** 
 * Change number or products per row based on Genesis layout
 * 
 * @since 1.0 
 */
function ayo_shop_columns() {
	if ( genesis_site_layout() == 'full-width-content' ) {
		return 4;
	} else {
		return 3;
	}	
}


remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_pagination', 'genesis_posts_nav', 25 );
/** 
 * Change number or related products per row based on layout
 * 
 * @since 1.0 
 */
function woocommerce_output_related_products() {
	if ( genesis_site_layout() == 'full-width-content' ) {
		woocommerce_related_products( 4, 4 ); // Display 4 products in rows of 4
	} else{
		woocommerce_related_products( 3, 3 ); // Display 3 products in rows of 3
	}
}


global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	add_action( 'init', 'ayothemes_woocommerce_image_size', 1 );
}
/** 
 * Change default WooCommerce images size
 * 
 * @since 1.0
 * @todo How if theme activated first?
 */
function ayothemes_woocommerce_image_size() {
	update_option( 'woocommerce_catalog_image_width', '380' ); // Product category thumbs
	update_option( 'woocommerce_catalog_image_height', '380' );
	update_option( 'woocommerce_single_image_width', '620' ); // Featured product image
	update_option( 'woocommerce_single_image_height', '620' ); 
	update_option( 'woocommerce_thumbnail_image_width', '180' ); // Image gallery thumbs
	update_option( 'woocommerce_thumbnail_image_height', '180' );

	update_option( 'woocommerce_thumbnail_image_crop', 1 );
	update_option( 'woocommerce_single_image_crop', 0 ); 
	update_option( 'woocommerce_catalog_image_crop', 1 );
}

/** Make woocommerce widget tag cloud consistent */
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'ayo_widget_tag_cloud_args' );