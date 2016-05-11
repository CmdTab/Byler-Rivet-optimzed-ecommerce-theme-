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
} ?>

<?php wc_print_notices(); ?>

<div class="account-sidebar group">
	
	<h2>Welcome <?php echo esc_html($current_user->first_name); ?></h2>
	<div class="account-navigation group">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account">My Account</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-account/">My Account Information</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/">My Addresses</a>
	</div>
</div>
<div class="account-forms group">
	<div class="account-wrap group">
		<header>
			<h1 class="title entry-title"><?php the_title( $title_before, $title_after ); ?></h1>
			<?php
			printf(
		//		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
				__( '<a href="/account/log-out/">(Log Out)</a>', 'woocommerce' ) . ' ',
				$current_user->display_name,
				wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
			);
			?>
		</header>
		<p class="myaccount_user">
			<?php
			printf( __( 'From your account dashboard you can view your quote requests, <a href="/account/edit-address/shipping">manage your shipping address</a> and <a href="%s">edit your name, email address or password</a>.', 'woocommerce' ),
				wc_customer_edit_account_url()
			);
			?>
		</p>

		<hr />

		<?php do_action( 'woocommerce_before_my_account' ); ?>

		<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

		<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

		<?php //wc_get_template( 'myaccount/my-address.php' ); ?>

		<?php do_action( 'woocommerce_after_my_account' ); ?>
	</div>
</div>
