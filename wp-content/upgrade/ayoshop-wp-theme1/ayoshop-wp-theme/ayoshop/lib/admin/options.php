<?php

/**
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 * 
 * @since 1.0
 */
function optionsframework_option_name() {
	$optionsframework_settings = get_option( 'optionsframework' );	
	$optionsframework_settings['id'] = 'ayo_theme_customizer';
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * This function handle options framework array
 * 
 * @since 1.0
 */
function optionsframework_options() {

	/** Background Defaults */
	$background_defaults = array(
		'color' => '#eeeeee',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	/** Woocommerce Content */
	$ayo_products = array(
		'Recent Products'	=> 'recent_products',
		'Featured Products'	=> 'featured_products',
		);

	$options = array();

	/** General Settings */
	$options[] = array( "name" => __( 'General', 'ayo' ),
		"type"		=> "heading" );

	$options[] = array( 
		"name" 		=> __( 'Custom favicon', 'ayo' ),
		"desc" 		=> __( 'Upload an image or insert link URL. Best size for favicon is 16x16px.', 'ayo' ),
		"id" 		=> "ayo_favicon",
		"type" 		=> "upload" );

	$options[] = array( 
		"name" 		=> __( 'Image logo', 'ayo' ),
		"desc" 		=> __( 'Upload an image or insert link URL.', 'ayo' ),
		"id" 		=> "ayo_image_logo",
		"class"		=> "upload_hide",
		"type" 		=> "upload");

	$options[] = array(
		'name'		=> __( 'Tips for image size logo (optional)', 'ayo' ),
		'desc'		=> sprintf( __( 'For best preview at retina display,  divide the image logo size by two. <br \>For example: Image logo size is %s, divided by two will be %spx. ( width x height )', 'ayo' ), '<code>600x160</code>', '<code>300x80</code>' ),
		'type'		=> 'info');

	$options[] = array(
		'name'		=> __( 'Image logo width', 'ayo'),
		'desc'		=> 'px',
		'id'		=> 'ayo_logo_width',
		'std'		=> '220',
		'class'		=> 'mini',
		'type'		=> 'text');

	$options[] = array(
		'name'		=> __( 'Image logo height', 'ayo'),
		'desc'		=> 'px',
		'id'		=> 'ayo_logo_height',
		'std'		=> '100',
		'class'		=> 'mini',
		'type'		=> 'text');

	$options['ayo_footer_copyright'] = array( 
		"name" 		=> __( 'Custom footer copyright', 'ayo' ),
		"desc" 		=> sprintf( __( 'You can use <a href="%s" target="_blank">Genesis shortcode</a> at footer.', 'ayo' ), 'http://my.studiopress.com/docs/shortcode-reference/' ),
		"id" 		=> "ayo_footer_copyright",
		"std" 		=> 'Copyright [footer_copyright] <a href="http://designmodo.com">Designmodo</a>',
		"type" 		=> "textarea");

	$options['ayo_custom_css'] = array(
		"name"		=> __( 'Custom CSS', 'ayo'),
		"id"		=> "ayo_custom_css",
		"std"		=> "",
		"type"		=> "textarea" );

	/** Homepage Settings */
	$options[] = array( "name" 	=> __( 'Homepage', 'ayo' ),
						"type"	=> "heading" );

	$options[] = array(
		'name'		=> __( 'Slider effect', 'ayo' ),
		'desc'		=> __( 'Select slider effect.', 'ayo' ),
		'id'		=> 'ayo_slider_effect',
		'std'		=> 'fade',
		'type'		=> 'select',
		'options'	=> array(
			'fade'	=> 'fade',
			'slide'	=> 'slide' ) );

	$options[] = array(
		'name'		=> __( 'Slider slideshow speed', 'ayo'),
		'desc'		=> 'per milisecond',
		'id'		=> 'ayo_slideshow_speed',
		'std'		=> '7000',
		'class'		=> 'mini',
		'type'		=> 'text');

	$options[] = array(
		'name'		=> __( 'Slider animation speed', 'ayo'),
		'desc'		=> 'per milisecond',
		'id'		=> 'ayo_animation_speed',
		'std'		=> '600',
		'class'		=> 'mini',
		'type'		=> 'text');

	$options['ayo_custom_intro'] = array(
		"name"		=> __( 'Custom intro text', 'ayo'),
		'desc'		=> __( 'A short introduction about your website.', 'ayo' ),
		"id"		=> "ayo_custom_intro",
		"std"		=> "This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from.",
		"type"		=> "textarea" );

	$options['ayo_intro_position'] = array(
		'name'		=> __( 'Intro text position', 'ayo'),
		'id'		=> 'ayo_intro_position',
		'std'		=> 'after',
		'type'		=> 'radio',
		'options'	=> array(
			'before'	=> __( 'Before slider', 'ayo' ),
			'after'		=> __( 'After slider', 'ayo' )
			));
	
	/** Styling Settings */
	$options[] = array( "name" => __( 'Styling', 'ayo' ),
		"type"		=> "heading" );

	$options['ayo_enable_responsive'] = array(
		"name" 		=> __( 'Responsive layout', 'ayo'),
		"desc" 		=> __( 'Check this if you want to enable responsive layout.', 'ayo'),
		"id" 		=> "ayo_enable_responsive",
		"std" 		=> "1",
		"type" 		=> "checkbox");

	$options['ayo_general_color'] = array(
		"name"		=> __( 'General color', 'ayo'),
		"id"		=> "ayo_general_color",
		"std"		=> "#444444",
		"type"		=> "color" );

	$options['ayo_border_color'] = array(
		"name"		=> __( 'Border color', 'ayo'),
		"id"		=> "ayo_border_color",
		"std"		=> "#eaeaea",
		"type"		=> "color" );

	$options['ayo_nav_color'] = array(
		"name"		=> __( 'Navigation color', 'ayo'),
		"id"		=> "ayo_nav_color",
		"std"		=> "#aaaaaa",
		"type"		=> "color" );

	$options['ayo_nav_hover'] = array(
		"name"		=> __( 'Navigation hover/active color', 'ayo'),
		"id"		=> "ayo_nav_hover",
		"std"		=> "#444444",
		"type"		=> "color" );

	$options['ayo_link_color'] = array(
		"name"		=> __( 'Link color', 'ayo'),
		"id"		=> "ayo_link_color",
		"std"		=> "#3695e5",
		"type"		=> "color" );

	$options['ayo_hover_color'] = array(
		"name"		=> __( 'Hover color', 'ayo'),
		"id"		=> "ayo_hover_color",
		"std"		=> "#ff4929",
		"type"		=> "color" );

	$options['ayo_body_color'] = array(
		"name"		=> __( 'Body content color', 'ayo'),
		"id"		=> "ayo_body_color",
		"std"		=> "#444444",
		"type"		=> "color" );

	$options['ayo_heading_font'] = array(
		'name' 		=> __( 'Heading font', 'ayo' ),
		'desc'		=> __('Choose font.', 'ayo'),
		'id'		=> 'ayo_heading_font',
		'std'		=> '"Palatino Linotype", "Book Antiqua", Palatino, serif',
		'type'		=> 'select',
		'options'	=> ayo_mixin_fonts() );

	$options['ayo_body_font'] = array(
		'name' 		=> __( 'Body font', 'ayo' ),
		'desc'		=> __( 'Choose font.', 'ayo'),
		'id'		=> 'ayo_body_font',
		'std'		=> '"Palatino Linotype", "Book Antiqua", Palatino, serif',
		'type'		=> 'select',
		'options'	=> ayo_websafe_fonts() );

	/** WooCommerce Settings */
	if ( class_exists( 'WooCommerce') ) {
		
		$options[] = array( "name" => "WooCommerce",
			"type"		=> "heading" );

		$options[] = array(
			"name" 		=> __( 'Cart', 'ayo' ),
			"desc" 		=> __( 'Display my account and cart at header?', 'ayo' ),
			"id" 		=> "ayo_gw_meta",
			"std" 		=> "1",
			"type" 		=> "checkbox");

		$options[] = array(
			'name'		=> __( 'Shop page loop', 'ayo'),
			'desc'		=> __( 'product\'s to show per page. 0 will based upon your default WordPress &rarr; reading setting.', 'ayo' ),
			'id'		=> 'ayo_shop_loop',
			'std'		=> '15',
			'class'		=> 'mini',
			'type'		=> 'select',
			'options'	=> ayo_number_array() );

		$options[] = array(
			"name" 		=> __( 'Featured product', 'ayo'),
			"desc" 		=> __( 'Display featured product at homepage slider template?.', 'ayo'),
			"id" 		=> "ayo_enable_featured_products",
			"std" 		=> "0",
			"type" 		=> "checkbox");

		$options[] = array(
			'name'		=> __('Title for featured products', 'ayo'),
			'desc'		=> __('For featured products list.', 'ayo'),
			'id'		=> 'ayo_featured_products_title',
			'std'		=> 'Featured Products',
			"class"		=> "hidden",
			'type'		=> 'text');

		$options[] = array(
			"name" 		=> __( 'Recent product', 'ayo'),
			"desc" 		=> __( 'Display recent product at homepage slider template?.', 'ayo'),
			"id" 		=> "ayo_enable_recent_products",
			"std" 		=> "0",
			"type" 		=> "checkbox");

		$options[] = array(
			'name'		=> __('Title for recent products', 'ayo'),
			'desc'		=> __('For recent products list.', 'ayo'),
			'id'		=> 'ayo_recent_products_title',
			'std'		=> 'Recent Products',
			"class"		=> "hidden",
			'type'		=> 'text');

	}


	return $options;
}

add_action( 'customize_register', 'register_ayo_theme_customizer', 5 );
/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 * 
 * @since 1.0
 */
function register_ayo_theme_customizer( $wp_customize ) {

	//extend the theme_customizer <= Textarea
	class Ayo_Customize_Textarea_Control extends WP_Customize_Control {
		
	public $type = 'textarea';

	public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

	$options = optionsframework_options();

	/* General Colors */
	$wp_customize->add_section( 'ayo_color_customizer', array(
		'title' => __( 'General Colors', 'ayo' ),
		'priority' => 110
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_general_color]', array(
		'default' => $options['ayo_general_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_general_color', array(
		'label'   => $options['ayo_general_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_general_color]'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_border_color]', array(
		'default' => $options['ayo_border_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_border_color', array(
		'label'   => $options['ayo_border_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_border_color]'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_nav_color]', array(
		'default' => $options['ayo_nav_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_nav_color', array(
		'label'   => $options['ayo_nav_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_nav_color]'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_nav_hover]', array(
		'default' => $options['ayo_nav_hover']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_nav_hover', array(
		'label'   	=> $options['ayo_nav_hover']['name'],
		'section' 	=> 'ayo_color_customizer',
		'settings'  => 'ayo_theme_customizer[ayo_nav_hover]',
		'type'		=> 'color'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_link_color]', array(
		'default' => $options['ayo_link_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_link_color', array(
		'label'   => $options['ayo_link_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_link_color]'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_hover_color]', array(
		'default' => $options['ayo_hover_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_hover_color', array(
		'label'   => $options['ayo_hover_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_hover_color]'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_body_color]', array(
		'default' => $options['ayo_body_color']['std'],
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ayo_body_color', array(
		'label'   => $options['ayo_body_color']['name'],
		'section' => 'ayo_color_customizer',
		'settings'   => 'ayo_theme_customizer[ayo_body_color]'
	) ) );

	/* Additional */
	$wp_customize->add_section( 'ayo_intro_customizer', array(
		'title' => __( 'Additional settings', 'ayo' ),
		'priority' => 115
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_enable_responsive]', array(
		'default' => $options['ayo_enable_responsive']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ayo_enable_responsive', array(
		'label' => $options['ayo_enable_responsive']['name'],
		'section' => 'ayo_intro_customizer',
		'settings' => 'ayo_theme_customizer[ayo_enable_responsive]',
		'type' => $options['ayo_enable_responsive']['type']
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_custom_intro]', array(
		'default'	=> $options['ayo_custom_intro']['std'],
		'type'		=> 'option'
	) );

	$wp_customize->add_control( new Ayo_Customize_Textarea_Control( $wp_customize, 'ayo_custom_intro', array(
		'label'   	=> $options['ayo_custom_intro']['name'],
		'section' 	=> 'ayo_intro_customizer',
		'settings'  => 'ayo_theme_customizer[ayo_custom_intro]',
		'type' 		=> 'textarea'
	) ) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_intro_position]', array(
		'default' => $options['ayo_intro_position']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ayo_intro_position', array(
		'label' => $options['ayo_intro_position']['name'],
		'section' => 'ayo_intro_customizer',
		'settings' => 'ayo_theme_customizer[ayo_intro_position]',
		'type' => $options['ayo_intro_position']['type'],
		'choices' => $options['ayo_intro_position']['options']
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_footer_copyright]', array(
		'default'	=> $options['ayo_footer_copyright']['std'],
		'type'		=> 'option'
	) );

	$wp_customize->add_control( new Ayo_Customize_Textarea_Control( $wp_customize, 'ayo_footer_copyright', array(
		'label'   	=> $options['ayo_footer_copyright']['name'],
		'section' 	=> 'ayo_intro_customizer',
		'settings'  => 'ayo_theme_customizer[ayo_footer_copyright]',
		'type' 		=> 'textarea'
	) ) );

	/* Typography */
	$wp_customize->add_section( 'ayo_typography_customizer', array(
		'title' => __( 'Typography', 'ayo' ),
		'priority' => 120
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_heading_font]', array(
		'default' => $options['ayo_heading_font']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ayo_heading_font_cuztomizer', array(
		'label' => $options['ayo_heading_font']['name'],
		'section' => 'ayo_typography_customizer',
		'settings' => 'ayo_theme_customizer[ayo_heading_font]',
		'type' => $options['ayo_heading_font']['type'],
		'choices' => $options['ayo_heading_font']['options']
	) );

	$wp_customize->add_setting( 'ayo_theme_customizer[ayo_body_font]', array(
		'default' => $options['ayo_body_font']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ayo_heading_body_cuztomizer', array(
		'label' => $options['ayo_body_font']['name'],
		'section' => 'ayo_typography_customizer',
		'settings' => 'ayo_theme_customizer[ayo_body_font]',
		'type' => $options['ayo_body_font']['type'],
		'choices' => $options['ayo_body_font']['options']
	) );

}


add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#ayo_enable_featured_products').click(function() {
  		$('#section-ayo_featured_products_title').fadeToggle(400);
	});

	if ($('#ayo_enable_featured_products:checked').val() !== undefined) {
		$('#section-ayo_featured_products_title').show();
	}

	$('#ayo_enable_recent_products').click(function() {
  		$('#section-ayo_recent_products_title').fadeToggle(400);
	});

	if ($('#ayo_enable_recent_products:checked').val() !== undefined) {
		$('#section-ayo_recent_products_title').show();
	}

});
</script>

<?php
}