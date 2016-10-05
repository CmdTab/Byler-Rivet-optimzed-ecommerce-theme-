<?php
/**
 * Order details
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		$order = wc_get_order( $order_id );
		?>
		<h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
		<table class="shop_table order_details">
			<thead>
				<tr>
					<th class="product-image"><?php _e( 'Image', 'woocommerce' ); ?></th>
					<th class="product-sku"><?php _e( 'SKU', 'woocommerce' ); ?></th>
					<th class="product-mfg"><?php _e( 'MFG Part #', 'woocommerce' ); ?></th>
					<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
					<th class="product-qty"><?php _e( 'Qty', 'woocommerce' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ( sizeof( $order->get_items() ) > 0 ) {

					foreach( $order->get_items() as $item ) {
						$_product     = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
						$item_meta    = new WC_Order_Item_Meta( $item['item_meta'], $_product );

						?>

						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
							<td class="product-image">
								<?php echo get_the_post_thumbnail($item['product_id']); ?>
							</td>
							<td class="product-sku">
								<?php echo $_product->get_sku(); ?>
							</td>
							<td class="product-mfg">
								<?php
									if ( $_product )
										echo the_field('manufacturer_brand_part_number', $item['product_id']);
								?>
								
							</td>
							<td class="product-name">
								<?php
									if ( $_product && ! $_product->is_visible() )
										echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
									else
										echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );

									//echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item );

									$item_meta->display();

									if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

										$download_files = $order->get_item_downloads( $item );
										$i              = 0;
										$links          = array();

										foreach ( $download_files as $download_id => $file ) {
											$i++;

											$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'woocommerce' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
										}

										echo '<br/>' . implode( '<br/>', $links );
									}
								?>
							</td>
							<td class="product-qty">
								<?php echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '%s', $item['qty'] ) . '</strong>', $item ); ?>
							</td>
							<!-- <td class="product-total">
								<?php //echo $order->get_formatted_line_subtotal( $item ); ?>
							</td> -->
						</tr>
						<?php

						if ( $order->has_status( array( 'completed', 'processing' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
							?>
							<tr class="product-purchase-note">
								<td colspan="3"><?php echo wpautop( do_shortcode( $purchase_note ) ); ?></td>
							</tr>
							<?php
						}
					}
				}

				do_action( 'woocommerce_order_items_table', $order );
				?>
			</tbody>
			<tfoot>
				<?php
					if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
						?>
						<tr class="order_item">
							<td class="invisible"></td>
							<td class="invisible"></td>
							<td class="invisible"></td>
							<td scope="row"><?php echo $total['label']; ?></td>
							<td><?php echo $total['value']; ?></td>
						</tr>
						<?php
					endforeach;
				?>
			

			</tfoot>
		</table>

		<div class="details_section order_notes group">
			<?php if ( $order->customer_message ) : ?>
				<h2>Order Notes</h2>
				<p><?php echo $order->customer_message; ?></p>
			<?php else : ?>
				<h2>Order Notes</h2>
				<p>No notes available.</p>
			<?php endif; ?>
		</div>

		<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
		<div class="details_section group">
			<header>
				<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
			</header>
			<dl class="customer_details">
				<?php $current_user = wp_get_current_user(); ?>
				
				<dt>
					<?php echo esc_html($current_user->first_name); ?>
					<?php echo esc_html($current_user->last_name); ?>
				</dt>
				<dt>
					<?php echo esc_html($current_user->billing_company); ?>
				</dt>
			<?php
				if ( $order->billing_email ) echo '<dt>' . __( '', 'woocommerce' ) . $order->billing_email . '</dt>';
				if ( $order->billing_phone ) echo '<dt>' . __( '', 'woocommerce' ) . $order->billing_phone . '</dt>';

				// Additional customer details hook
				do_action( 'woocommerce_order_details_after_customer_details', $order );
			?>
				<dt>
					<?php echo esc_html($current_user->billing_country); ?>
				</dt>
				<dt>
					<?php echo esc_html($order->billing_address); ?>
				</dt>
			</dl>

			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

			<div class="col2-set addresses">

				<div class="col-1">

			<?php endif; ?>
				<div class="address-details">
					<header class="title">
						<h3><?php _e( 'Address', 'woocommerce' ); ?></h3>
					</header>
					<address>
						<?php
							if ( ! $order->get_formatted_billing_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address();
						?>
					</address>
				</div>

			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

				</div><!-- /.col-1 -->

				<div class="col-2">

					<header class="title">
						<h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
					</header>
					<address>
						<?php
							if ( ! $order->get_formatted_shipping_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address();
						?>
					</address>

				</div><!-- /.col-2 -->

			</div><!-- /.col2-set -->

			<?php endif; ?>
		</div>
</div>
</div>

<div class="clear"></div>
