<?php
/**
 * Edit address form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $current_user;

$page_title = ( $load_address === 'billing' ) ? __( 'Edit Account Information', 'woocommerce' ) : __( 'Edit Shipping Address', 'woocommerce' );

get_currentuserinfo();
?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>
<div class="account-sidebar group">
	<h2>Account Dashboard <!-- Welcome, <?php //echo esc_html($current_user->user_firstname); ?> <?php //echo esc_html($current_user->user_lastname); ?> --></h2>
	<div class="account-navigation group">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account">Account Dashboard</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing/">Account Information</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/view-quotes/">View Quotes</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-account/">Change Password</a>
	</div>
</div>
<div class="account-forms group">
	<div class="account-wrap group">

		<form method="post">

			<h2><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h2>

			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<?php foreach ( $address as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

			<?php endforeach; ?>
			
			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p>
				<input type="submit" class="button" name="save_address" value="<?php _e( 'Save Information', 'woocommerce' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>

		</form>
	</div>
</div>
<?php endif; ?>
