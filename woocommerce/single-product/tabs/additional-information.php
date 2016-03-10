<?php
/**
 * Additional Information tab
 * 
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly
	exit;
}

global $product;
// Edited 01122015, Chris
// Change 'Additional Information' to 'Product Parameters'
//$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional Information', 'woocommerce' ) );
$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Product Parameters', 'woocommerce' ) );
?>

<?php if ( $heading ): ?>
	<h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php $product->list_attributes(); ?>