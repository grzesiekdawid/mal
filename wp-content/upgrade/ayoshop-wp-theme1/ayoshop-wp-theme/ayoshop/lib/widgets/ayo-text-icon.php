<?php

if( !class_exists('Ayo_Text_Icon') ) {
	class Ayo_Text_Icon extends AQ_Block {

		function __construct() {
			$block_options = array(
				'name' => __( 'Text Icon', 'ayo' ),
				'size' => 'span4',
			);
			
			//create the block
			parent::__construct( 'ayo_text_icon', $block_options );
		}

	 	function form( $instance ) {
			// outputs the options form on admin
			$defaults = array(
				'ayo_icon' => 'icon-adjust',
				'content' => '',
			);

			$instance = wp_parse_args($instance, $defaults);
			extract($instance);

			?>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					<?php _e( 'Title (required)', 'ayo');?><br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('ayo_icon') ?>">
					<?php _e( 'Icon Type', 'ayo');?><br/>
					<?php echo aq_field_select( 'ayo_icon', $block_id, ayo_font_awesome_array(), $ayo_icon ) ?>
				</label>
			</p>
			
			<p class="description last">
				<label for="<?php echo $this->get_field_id( 'content' ) ?>">
					<?php _e( 'Content', 'ayo');?><br/>
					<?php echo aq_field_textarea( 'content', $block_id, $content ) ?>
				</label>
			</p>
			<?php

		}

		function block( $instance ) {
			extract($instance);

			if ( $title ) {
				echo '<h4 class="ayo_icon_title"><i class="'.$ayo_icon.' icon-large"></i>&nbsp;'. $title .'</h4>';
			}

			if ( $content ) {
				echo wpautop( $content );
			}
		
		}

	}
}

aq_register_block( 'Ayo_Text_Icon' );