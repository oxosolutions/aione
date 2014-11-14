<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version	 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address == 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

get_currentuserinfo();

?>

<?php wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
	?>
</p>

<?php $edit_address = true; ?>
<?php do_action( 'woocommerce_before_my_account', $edit_address ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php
if( ! isset( $order_count ) ) {
	$order_count = 5;
}
wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php if ( ! $load_address ) : ?>
	<div class="myaccount_address">
		<?php wc_get_template( 'myaccount/my-address.php' ); ?>
	</div>

<?php else : ?>

	<h2 class="edit_address_heading"><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h2>
	<div class="myaccount_address">
		<form method="post">

			<?php foreach ( $address as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

			<?php endforeach; ?>

			<p>
				<input type="submit" class="button small default alignright" name="save_address" value="<?php _e( 'Save Address', 'woocommerce' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />
				<div class="clearboth"></div>
			</p>

		</form>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>