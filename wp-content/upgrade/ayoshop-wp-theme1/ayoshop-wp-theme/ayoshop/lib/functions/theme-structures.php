<?php

/**
 *  This file control Child theme structure
 *
 *  @package Ayo Shop
 *  @author AyoThemes
 *  @since 1.0
 * 
 */


/**
 *  Function to control slider area
 *
 *  @since 1.0
 */
function ayo_slider_content(){
	/** Conditional statement if attahcment*/
	$is_attachments = get_children( array(
		'post_parent' => get_the_ID(), 
		'post_type' => 'attachment',
		'post_mime_type' => 'image')
	);

	if ( of_get_option( 'ayo_intro_position' ) =='before' ) {		
		echo ayo_intro_text_display( 'before_slider' );
	}
	
	/** Widget or built-in slider*/
	if ( is_active_sidebar( 'ayo-homepage-slider' ) ) {
		echo '<div id="ayo-slider-wrap" class="clearfix">';
			dynamic_sidebar( 'ayo-homepage-slider' );
		echo '</div><!-- end #ayo-slider-wrap -->';	
	} elseif( $is_attachments ) {
		echo '<div id="ayo-slider-wrap" class="clearfix">';
			ayo_slider_entry();
		echo '</div><!-- end #ayo-slider-wrap -->';
	}

	if ( of_get_option( 'ayo_intro_position' ) =='after' ) {
		echo ayo_intro_text_display( 'after_slider' );
	}

}

/**
 *  Function to output intro text display
 *
 *  @since 1.0
 */
function ayo_intro_text_display($position){

	if ( of_get_option( 'ayo_custom_intro' ) !=="" ) {
		$output = '';
		$output .= '<div id="ayo-homepage-intro" class="'.$position.'" >';
		$output .= of_get_option( 'ayo_custom_intro' );
		$output .= '</div><!-- end #ayo-homepage-intro -->';

		return $output;
	}
	
}

/**
 *  This file control slider structure and loop
 *
 *  @since 1.0
 */
function ayo_slider_entry(){	
?>

	<div class="ayo-flexslider">
		<ul class="ayo-slides">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();    

		global $post;
		$args = array(
			'post_type'		=> 'attachment',
			'numberposts'	=> -1,
			'post_status'	=> null,
			'post_parent'	=> $post->ID,
			'order'			=> 'ASC',
			'orderby'		=> 'menu_order',
			'no_found_rows' => true,
			'cache_results' => false,
			'update_post_term_cache' => false,
    		'update_post_meta_cache' => false
		);

		$attachments = get_posts( $args );
			if ( $attachments ) {
				foreach ( $attachments as $post ) {	
				setup_postdata($post);	

				echo '<li>';

					$alt_text = get_post_meta( $post->ID, '_wp_attachment_image_alt', true);
					$slider_link = get_post_meta( $post->ID, '_wp_attachment_url', true );

					$slide_img = genesis_get_image( array( 
						'format' => 'html', 
						'size' => 'ayo-slider', 
						'attr' => array( 
							'class' => 'ayo-slide-img', 
							'title' => trim( esc_attr( get_the_title() ) ), 
							'alt' => trim( esc_attr( $alt_text ) ) ) 
						) 
					);

					if ( $alt_text && $slider_link ) {
						echo '<a class="slider_link" href="'. esc_url( $slider_link ) .'" title="'. trim( esc_attr( get_the_title() ) ) .'">'. $slide_img .'</a>';
					} else {
						echo $slide_img;
					}

					echo '<div class="slides_content">';

						if ( strlen( get_the_title() ) == 0 ) {
							return;
						} else {
							echo '<h4>'. trim( strip_tags( get_the_title() ) ) .'</h4>';					
						}

						if ( get_the_excerpt() !=="") {
							echo '<p>'. wp_trim_words( get_the_excerpt(), 25, null ) .'</p>';
						}

						if ( $alt_text && $slider_link) { 
							echo '<a class="ayo_slider_link" href="'. esc_url( $slider_link ) .'" title="'. trim(strip_tags( $alt_text ) ) .'">'. trim(strip_tags( $alt_text ) ) .'</a>';
						}

					echo '</div>';

				echo '</li><!-- end .ayo-slides li -->';
			}
		}

		endwhile; 

		endif; ?>


		</ul><!-- end .ayo-slides -->
	</div><!-- end .wrap -->
	
<?php
	wp_reset_query();
}

/**
 *  This file control homepage slider content
 *
 *  @since 1.0
 */
function ayo_homepage_content_loop() {

	if ( is_active_sidebar( 'ayo-homepage-widget' ) ) {
		echo '<div id="ayo-homepage-widget">';
			dynamic_sidebar( 'ayo-homepage-widget' );
		echo '</div><!-- end #ayo-homepage-widget -->';
	}

	if ( class_exists( 'woocommerce' ) ) {

		if ( of_get_option('ayo_enable_featured_products') == 1 ) {
			if ( of_get_option( 'ayo_featured_products_title' ) !=="" ) {
				echo '<h4 class="ayo-procucts-title"><span>'. esc_attr( of_get_option( 'ayo_featured_products_title' ) ) .'</span></h4>';
			}
			if ( genesis_site_layout() == 'full-width-content' ) {
				echo do_shortcode('[featured_products per_page="4" columns="4" orderby="date" order="desc"]');
			} else {
				echo do_shortcode('[featured_products per_page="3" columns="3" orderby="date" order="desc"]');
			}
		}

		if ( of_get_option('ayo_enable_recent_products') == 1 ) {
			if ( of_get_option( 'ayo_recent_products_title' ) !=="" ) {
				echo '<h4 class="ayo-procucts-title"><span>'. esc_attr( of_get_option( 'ayo_recent_products_title' ) ) .'</span></h4>';
			}

			if ( genesis_site_layout() == 'full-width-content' ) {
				echo do_shortcode('[recent_products per_page="4" columns="4" orderby="date" order="desc"]');
			} else {
				echo do_shortcode('[recent_products per_page="3" columns="3" orderby="date" order="desc"]');
			}
		}
		
	}

}