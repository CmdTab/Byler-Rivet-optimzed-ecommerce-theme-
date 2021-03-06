<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
}

$col = 1;
?>
<div class="account-forms full group">
	<div class="account-wrap account-address group">

		<h2>Address</h2>

		<!-- <p class="myaccount_address">
			<?php //echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following address will be used when you submit a quote request. We will use this address to determine shipping costs.', 'woocommerce' ) ); ?> 
		</p>-->

		<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="col2-set addresses">'; ?>

		<?php foreach ( $get_addresses as $name => $title ) : ?>

			<div class="col-<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> address group">
				<!-- <header class="title">
					<h3><?php // echo $title; ?></h3>
				</header> -->
				<address>
					<?php
						$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
							'company'     => get_user_meta( $customer_id, $name . '_company', true ),
							'first_name'  => get_user_meta( $customer_id, $name . '_first_name', true ),
							'last_name'   => get_user_meta( $customer_id, $name . '_last_name', true ),
							'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
							'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
							'city'        => get_user_meta( $customer_id, $name . '_city', true ),
							'state'       => get_user_meta( $customer_id, $name . '_state', true ),
							'postcode'    => get_user_meta( $customer_id, $name . '_postcode', true ),
							'country'     => get_user_meta( $customer_id, $name . '_country', true )
						), $customer_id, $name );

						$formatted_address = WC()->countries->get_formatted_address( $address );

						if ( ! $formatted_address )
							_e( 'You have not set up this type of address yet.', 'woocommerce' );
						else
							echo $formatted_address;
					?>
				</address>
				<div class="address-info">
					<?php echo get_user_meta( $customer_id, 'billing_phone', true ); ?>
					<br />
					<?php global $current_user; get_currentuserinfo(); echo $current_user->user_email; ?>
				</div>
			</div>

		<?php endforeach; ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing/" class="btn address-btn"><?php _e( 'Edit Address', 'woocommerce' ); ?></a>

		<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>

	</div>
</div>