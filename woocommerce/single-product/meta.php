<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<strong><abbr title="Manufacturer">MFR</abbr> Part <abbr title="Number">#</abbr></strong>: <?php the_field('manufacturer_brand_name_text'); ?> <?php the_field('manufacturer_brand_part_number'); ?><br/>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( '<strong>Byler Rivet Part <abbr title="Number">#</abbr></strong>:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span><br/>

	<?php endif; ?>

	<!-- custom field for single product manufacturer logo -->
	<div class="single-prod-logo">
		<p>Brand:</p>
		<a href="<?php the_field('manufacturer_brand_shop_url'); ?>" title="View all <?php the_field('manufacturer_brand_name_text'); ?> products">
			<img src="<?php the_field('manufacturer_brand_logo'); ?>" alt="<?php the_field('manufacturer_brand_name_text'); ?>"/>
		</a>
	</div>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( '<strong>Category</strong>:', '<strong>Categories</strong>:', $cat_count, 'woocommerce' ) . ' ', '. <a href="/products/#browse-all-categories">Browse all categories</a></span><br/>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( '<strong>Tag</strong>:', '<strong>Tags</strong>:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>



	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>