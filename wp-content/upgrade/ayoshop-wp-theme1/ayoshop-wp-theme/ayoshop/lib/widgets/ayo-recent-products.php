<?php

/** A simple text block **/
class Ayo_Recent_Products extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => __( 'Recent Product', 'ayo' ),
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct( 'Ayo_Recent_Products', $block_options );
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Recent Products',
			'products' => '4',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				<?php _e( 'Title (optional):', 'ayo'); ?>
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
			</label>
		</p>

		<p class="description">
			<label for="<?php echo $this->get_field_id('products') ?>">
				<?php _e( 'Number of products to show:', 'ayo'); ?>
				<input id="<?php echo $this->get_field_id('products') ?>" class="input-min" type="text" value="<?php echo $products ?>" name="<?php echo $this->get_field_name('products') ?>">
			</label>
		</p>
		<?php
	}
	
	function block($instance) {
		extract($instance);

		if ( $title ) {
			echo '<h4 class="ayo-procucts-title"><span>'. $title .'</span></h4>';
		}
		
		if ( $products ) {
			if ( genesis_site_layout() == 'full-width-content' ) {
				echo do_shortcode('[recent_products per_page="'. $products .'" columns="4" orderby="date" order="desc"]');
			} else {
				echo do_shortcode('[recent_products per_page="'. $products .'" columns="3" orderby="date" order="desc"]');
			}
		}

	}
	
}

aq_register_block( 'Ayo_Recent_Products' );