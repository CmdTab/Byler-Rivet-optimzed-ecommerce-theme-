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
	
	<h2>Account Dashboard<!-- Welcome <?php //echo esc_html($current_user->first_name); ?> --></h2>
	<div class="account-navigation group">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account">Account Dashboard</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing/">Account Information</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/view-quotes/">View Quotes</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-account/">Change Password</a>
	</div>
</div>
<div class="account-forms group">
	<div class="account-wrap group">
		<!-- <header>
			<h1 class="title entry-title"><?php // the_title( $title_before, $title_after ); ?></h1>
			
			<?php
		//	printf(
		//		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		//		__( '<a href="/account/log-out/">(Log Out)</a>', 'woocommerce' ) . ' ',
		//		$current_user->display_name,
		//		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
		//	);
			?>
		</header>
		<p class="myaccount_user">
			<?php
			// printf( __( 'From your account dashboard you can view your quote requests, <a href="/account/edit-address/shipping">manage your shipping address</a> and <a href="%s">edit your name, email address or password</a>.', 'woocommerce' ),
				//wc_customer_edit_account_url()
			//);
			?>
		</p>

		<hr /> -->

		<?php do_action( 'woocommerce_before_my_account' ); ?>

		<div class="account-container">
			<h2>Contact Information</h2>
			<div class="account-info">
				<p><span>Company Name: </span><?php echo esc_html($current_user->billing_company); ?></p>
				<p><span>First Name: </span><?php echo esc_html($current_user->first_name); ?></p>
				<p><span>Last Name: </span><?php echo esc_html($current_user->last_name); ?></p>
				<p><span>Email Address: </span><?php echo esc_html($current_user->user_email); ?></p>
			</div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing" class="btn account-info-btn">Edit Account Information</a>
		</div>

		<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

		<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => 3 ) ); ?>

		<?php wc_get_template( 'myaccount/my-address-new.php' ); ?>

		<?php do_action( 'woocommerce_after_my_account' ); ?>
	</div>
</div>
