<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>
<div class="wrap account-wrap group">
	<header>
		<h1 class="title entry-title"><?php the_title( $title_before, $title_after ); ?></h1>
	</header>
	<p class="myaccount_user">
		<?php
		printf(
	//		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
			__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="/account/log-out/">Log out now</a>),', 'woocommerce' ) . ' ',
			$current_user->display_name,
			wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
		);

		printf( __( '<br><br>From your account dashboard you can view your quote requests, <a href="/account/edit-address/shipping">manage your shipping address</a> and <a href="%s">edit your name, email address or password</a>.', 'woocommerce' ),
			wc_customer_edit_account_url()
		);
		?>
	</p>

	<?php do_action( 'woocommerce_before_my_account' ); ?>

	<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

	<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

	<?php do_action( 'woocommerce_after_my_account' ); ?>
</div>
