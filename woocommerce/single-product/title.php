<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="single-prod-title">
	<h1 itemprop="name" class="product_title entry-title">
		<?php the_title(); ?>
	</h1>

	<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<div class="star-rating" style="display:inline-block;color:#EFB932" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
			<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
				<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
			</span>
		</div>
		<div class="number-of-reviews" style="display:inline-block;">
			<?php printf( _n( '%s Review', '%s Reviews', $count, 'woocommerce' ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?> | <a href="#reviews" class="woocommerce-review-link" rel="nofollow">Write a Review</a>
		</div>
	</div>
</div>