<?php

/**
 * This file control Child theme style
 *
 * @package Ayo Shop
 * @author AyoThemes
 * @since 1.0
 */

if( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'ayo_register_styles', 15 );
	add_action( 'wp_head', 'ayo_dynamic_style', 15 );
}

/**
 * This function control ayo styles
 *
 * @since 1.0
 */
function ayo_register_styles(){

    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    wp_register_style( 'font-awesome', CHILD_THEME_LIB_URL .'/css/font-awesome.css', array(), CHILD_THEME_VERSION, 'all' );

    ayo_load_googlefont_style();

    wp_enqueue_style( 'font-awesome' );

    if ( class_exists( 'Woocommerce' ) ) {
        wp_enqueue_style( 'ayo-woocommerce', CHILD_THEME_LIB_URL .'/css/ayo-woocommerce.css', array(), CHILD_THEME_VERSION, 'all' );
    }

    if ( of_get_option( 'ayo_enable_responsive' ) ) {
        wp_enqueue_style( 'ayo-responsive', get_stylesheet_directory_uri() .'/responsive-styles.css', array(), CHILD_THEME_VERSION, 'all' );
    }

}

function ayo_load_googlefont_style(){
    if ( of_get_option( 'ayo_heading_font') ) {

        $font = of_get_option( 'ayo_heading_font' );
        $gfont = str_replace(" ", "+", $font );

        if ( in_array( $font, ayo_google_webfonts() ) ) {
            wp_enqueue_style( "$font", "http://fonts.googleapis.com/css?family=$gfont", array(), CHILD_THEME_VERSION, "all" );
        }
    }
}

/**
 * This function control ayo dynamic styles
 *
 * @since 1.0
 */
function ayo_dynamic_style(){

    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    $image_logo         = of_get_option( 'ayo_image_logo' );
    $logo_width         = of_get_option( 'ayo_logo_width' );
    $logo_height        = of_get_option( 'ayo_logo_height' );

    $output = '';

    if ( !of_get_option( 'ayo_enable_responsive' ) ) {
        $output .= 'body { min-width: 1140px}';
    }

    if ( of_get_option( 'ayo_custom_css') ) {
         $output .= of_get_option( 'ayo_custom_css');
    }

    if ( $image_logo ) {
         $output .= '
            .header-image #title a{
                background-image: url(" '.esc_url($image_logo).' ");
                height: '.$logo_height.'px;
                width: '.$logo_width.'px;
                max-width: 100%;
            }
         ';
    }

    if ( of_get_option( 'ayo_general_color' ) ) {
        $output .='

            ::-moz-selection { background-color: '. of_get_option( 'ayo_general_color' ) .' }
            ::selection{ background-color: '. of_get_option( 'ayo_general_color' ) .' }

            .post-meta { border-top-color: '. of_get_option( 'ayo_general_color' ) .' }

            #wrap,
            .breadcrumb,
            blockquote,
            input[type="text"].s:focus,
            #inner input[type="text"].s:focus,
            #ayo-homepage-widget,
            #ayo-homepage-widget:after,
            .widget-area h4,
            .homepage-featured h4,
            .widget-area h4:after,
            .homepage-featured h4:after,
            .widget_layered_nav ul li.chosen a,
            input[type="text"]:focus,
            input[type="password"]:focus,
            input[type="text"]#s:focus,
            textarea:focus,
            .navigation li a:hover,
            .navigation li.active a,
            ul.products li.product a img:hover,
            a.button.alt,
            button.button.alt,
            input.button.alt,
            #respond input#submit.alt,
            #content input.button.alt,
            .breadcrumb:after,
            .ayo-product-title:after { border-color: '. of_get_option( 'ayo_general_color' ) .' }

            .related.products h2,
            .ayo-procucts-title:after,
            .navigation,
            #footer { border-bottom-color: '. of_get_option( 'ayo_general_color' ) .' }

            .menu-primary-mobile,
            .menu-secondary-mobile,
            .menu-header-mobile,
            input[type="text"].s:focus,
            input[type="submit"].searchsubmit,
            #inner input[type="text"].s:focus,
            .ayo-control-nav li a.ayo-active,
            .widget_tag_cloud a,
            .widget_tag_cloud a:visited,
            .widget_product_tag_cloud a,
            .widget_product_tag_cloud a:visited,
            .ayo_woo_meta,
            .navigation li a:hover,
            .navigation li.active a,
            .widget_price_filter .ui-slider .ui-slider-range,
            .widget_layered_nav ul li.chosen a,
            input[type="text"]:focus,
            input[type="text"]#s:focus,
            input[type="password"]:focus,
            textarea:focus,
            #footer .gototop a,
            .widget_product_search input[type="submit"],
            span.onsale,
            ul.products li.product a img:hover,
            a.button.alt,
            button.button.alt,
            input.button.alt,
            #respond input#submit.alt,
            #content input.button.alt,
            .ayo-control-nav li a.ayo-active,
            .ayo-procucts-title:before,
            .widget_layered_nav ul small.count { background-color: '. of_get_option( 'ayo_general_color' ) .' }      
        ';
    }

    if ( of_get_option( 'ayo_border_color' ) ) {
        $output .= '
            .no-subnav #header,
            #nav,
            .sidebar.widget-area ul li,
            #footer-widgets .widget-area ul li,
            .hentry table td,
            .hentry table th,
            .featuredpage .page,
            .featuredpost .post,
            div.product .woocommerce_tabs ul.tabs:before,
            #content div.product .woocommerce_tabs ul.tabs:before { border-bottom-color: '. of_get_option( 'ayo_border_color' ) .' }

            input[type="text"],
            input[type="password"],
            select,
            textarea,
            .author-box,
            .sticky,
            .taxonomy-description,
            .wp-caption,
            #nav li ul,
            #header ul.menu li ul,
            .ayo_wc_meta li a,
            #subnav,
            #subnav li a:after,
            #subnav li ul,
            #nav li li a,
            #header ul.menu li li a,
            #subnav li li a,
            #nav li li:last-child li a,
            #header ul.menu li li:last-child li a,
            #subnav li li:last-child li a,
            #nav li li li:last-child li a,
            #header ul.menu li li li:last-child li a,
            #subnav li li li:last-child li a,
            #ayo-slider-wrap,
            #content .post-info .date,
            #content .post-info .post-comments,
            .avatar,
            .featuredpage img,
            .featuredpost img,
            img.post-image,
            input[type="text"].s,
            input[type="text"]#s,
            input[type="button"],
            input[type="submit"],
            #respond input[type="button"],
            #respond input[type="submit"],
            #reply-title small a,
            #comment .reply a,
            .navigation li a,
            .navigation li.disabled,
            .alt,
            .depth-1,
            .even,
            table.shop_table,
            #respond input#submit,
            #content input.button,
            a.shipping-calculator-button,
            div.product div.images img,
            #content div.product div.images img,
            .hentry table,
            .hentry table.order_details,
            div.product .woocommerce_tabs ul.tabs li,
            #content div.product .woocommerce_tabs ul.tabs li,
            ul.cart_list li img,
            ul.product_list_widget li img,
            #footer-widgets,
            #footer:after { border-color: '. of_get_option( 'ayo_border_color' ) .' }

        ';
    }

    if ( of_get_option( 'ayo_nav_color' ) ) {
        $output .= '
            #nav li a,
            #nav li li a,
            #nav li li a:link,
            #nav li li a:visited,
            #header ul.menu li a,
            #header ul.menu li li a,
            #header ul.menu li li a:link,
            #header ul.menu li li a:visited,
            #subnav li a,
            #subnav li li a,
            #subnav li li a:link,
            #subnav li li a:visited { color: '. of_get_option( 'ayo_nav_color' ) .' }
        ';
    }

    if ( of_get_option( 'ayo_nav_hover' ) ) {
        $output .= '
            #nav li a:hover,
            #nav li a:active,
            #nav li:hover a,
            #nav .current_page_item a,
            #nav .current-cat a,
            #nav .current-menu-item a,
            #header ul.menu li a:hover,
            #header ul.menu li a:active,
            #header ul.menu li:hover a,
            #header ul.menu .current_page_item a,
            #header ul.menu .current-cat a,
            #header ul.menu .current-menu-item a,
            #subnav li a:hover,
            #subnav li a:active,
            #subnav li:hover a,
            #subnav .current_page_item a,
            #subnav .current-cat a,
            #subnav .current-menu-item a,
            #nav li li a:hover,
            #nav li li a:active,
            #header ul.menu li li a:hover,
            #header ul.menu li li a:active,
            #subnav li li a:hover,
            #subnav li li a:active { color: '. of_get_option( 'ayo_nav_hover' ) .' }
        ';
    }

    if ( of_get_option( 'ayo_body_color' ) ) {
        $output .= '
            body, h1, h2, h3, h4, h5, h6, p,
            #title a,
            #description,
            .ayo_wc_meta li,
            .ayo_wc_meta li a,
            h2 a, h2 a:visited,
            .breadcrumb,
            .sidebar p.wp-caption-text,
            #content p.wp-caption-text { color: '. of_get_option( 'ayo_body_color' ) .'}
        ';
    }

    if ( of_get_option( 'ayo_link_color' ) && of_get_option( 'ayo_hover_color' ) ) {
        $output .= '
            a,
            a:visited{ color: '. of_get_option( 'ayo_link_color' ) .' }

            a:hover,
            #title a:hover,
            h2 a:hover,

            ul.products li.product a h3:hover,
            a.add_to_cart_button.button:hover,
            input[type="button"]:hover,
            input[type="submit"]:hover,
            #respond input[type="button"]:hover,
            #respond input[type="submit"]:hover,
            #reply-title small a:hover,
            #comment .reply a:hover,
            .ayo_wc_meta li a:hover { color: '. of_get_option( 'ayo_hover_color' ) .' }
        ';
    }

    if ( of_get_option( 'ayo_heading_font') ) {
        $output .='
            h1, h2, h3, h4, h5, h6, #title a { font-family: '. of_get_option( 'ayo_heading_font' ) .', serif }
        ';
    }

    if ( of_get_option( 'ayo_body_font') ) {
        $output .='
            body, p, #content p { font-family: '. of_get_option( 'ayo_body_font' ) .'}
        ';
    }

    if ( function_exists( 'GenesisResponsiveSliderInit' ) ) {
       $output .='
            #genesis-responsive-slider {
                border: none!important;
                padding: 0!important;
            }

            .flex-direction-nav li .prev{
                left: 0!important
            }
            
            .flex-direction-nav li .next{
                right: 0!important
            }
       ';
    }

    if ( class_exists( 'Tgmsp_Lite' )) {
        $output .= '.flex-container {overflow: hidden}';
    }

    if ( $output <> '' ) {
        $output = "<style type='text/css'>" .$output. "</style>";
        echo "\n<!-- Custom Child Theme Style -->\n".minify( $output )."\n";
    }

    /** IE Styles */
    $ie_styles = '';

    $ie_styles .= '

    ';

    if ( $is_IE && $ie_styles <> '' ) {
        $ie_styles = "<style type='text/css'>" .$ie_styles. "</style>";
        echo "<!--[if lt IE 9]>\n".minify( $ie_styles )."<![endif]-->\n";
    }

}

if ( !is_admin() ) add_action( 'init', 'aqua_builder_tweaks' );

function aqua_builder_tweaks() {
    if ( class_exists( 'AQ_Page_Builder' ) && AQPB_VERSION == '1.0.4') {
        wp_deregister_style( 'aqpb-view-css' );
        wp_register_style( 'ayo-aqpb-view', CHILD_THEME_LIB_URL .'/css/ayo-aqpb-view.css', array(), time(), 'all' );
        wp_enqueue_style( 'ayo-aqpb-view' );
    }
}