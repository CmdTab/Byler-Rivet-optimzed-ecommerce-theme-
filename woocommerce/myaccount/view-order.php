<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version   2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>
<div class="account-sidebar group">
	<h2>Account Dashboard
		<!-- Welcome 
		<?php 
			// $current_user = wp_get_current_user();
			// echo esc_html($current_user->first_name);
		?> -->
	</h2>
	<div class="account-navigation group">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account">Account Dashboard</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing/">Account Information</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/view-quotes/">View Quotes</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-account/">Change Password</a>
	</div>
</div>
<div class="account-forms group">
	<div class="account-wrap group">
		<p class="order-info"><?php printf( __( 'Order <mark class="order-number">%s</mark> was placed on <mark class="order-date">%s</mark>.', 'woocommerce' ), $order->get_order_number(), date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ), wc_get_order_status_name( $order->get_status() ) ); ?></p>

		<?php if ( $notes = $order->get_customer_order_notes() ) :
			?>
			<h2><?php _e( 'Order Updates', 'woocommerce' ); ?></h2>
			<ol class="commentlist notes">
				<?php foreach ( $notes as $note ) : ?>
				<li class="comment note">
					<div class="comment_container">
						<div class="comment-text">
							<p class="meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
							<div class="description">
								<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
							</div>
			  				<div class="clear"></div>
			  			</div>
						<div class="clear"></div>
					</div>
				</li>
				<?php endforeach; ?>
			</ol>
			<?php
		endif;
do_action( 'woocommerce_view_order', $order_id );
