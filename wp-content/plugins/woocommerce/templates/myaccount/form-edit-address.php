<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address == 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

get_currentuserinfo();
?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>
	<div class="address-form">
		<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fa fa-arrow-circle-left"></i>&nbsp;Back to profile</a>
		<form method="post" class="address-form">

			<?php foreach ( $address as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

			<?php endforeach; ?>

			<p class="save-address">
				<input type="submit" class="button" name="save_address" value="<?php _e( 'Save Address', 'woocommerce' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>

		</form>
		<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fa fa-arrow-circle-left"></i>&nbsp;Back to profile</a>
	</div>
<?php endif; ?>