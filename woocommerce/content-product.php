<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// get taxonomy for this page
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;

// Extra post classes
$classes = array('group');
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="prod-detail group <?php if(get_field('hide_image_in_list', $queried_object)) {echo 'no-image';} ?>">
		<div class="prod-image">
		<a href="<?php the_permalink(); ?>" class="prod-detail group">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			if(!get_field('hide_image_in_list', $queried_object)){
				do_action( 'woocommerce_before_shop_loop_item_title' );
			}
		?>
		</a>
		</div>
		<div class="prod-content">
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<div class="prod-title"><?php echo the_title(); ?></div>
			<div class="prod-desc"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?></div>
			
			<ul class="prod-meta">
				<?php if(get_field('manufacturer_brand_part_number')): ?>
				<li><span><abbr title="Manufacturer">MFG</abbr> Part #</span> <a href="<?php the_permalink(); ?>"><?php the_field('manufacturer_brand_part_number'); ?></a></li>
				<?php endif; ?>
				<li><span>Item #</span> <a href="<?php the_permalink(); ?>"><?php echo $product->sku; ?></a></li>
				<?php if ( function_exists('woo_add_compare_button' ) ): ?>
				<li><?php echo woo_add_compare_button(); ?></li>
				<?php endif; ?>
				<?php if(get_field('product_youtube_video_url')): ?>
				<li><a href = "<?php the_permalink(); ?>" class="prod-video-link"><span class="fa fa-play-circle"></span>Video</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<div class="prod-actions">
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>

</li>