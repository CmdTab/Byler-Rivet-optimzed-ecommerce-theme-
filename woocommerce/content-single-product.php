<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('single-prod'); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<!-- Questions about this product -->
			<div class="share-product-section group">
				<a href="#" class="share-product-trigger">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/images/mail-icon.png" />
					Share this Product
				</a>
				<div class="share-product-form">
					<?php the_field('share_product' , 'option'); ?>
				</div>
			</div>
			<div class="question-section group">
				<div class="product-question-form">
					<?php the_field('product_question_form' , 'option'); ?>
				</div>
				<div class="question">
					<img src="<?php echo get_bloginfo('template_directory'); ?>/images/qa.png" />
					<h4>Questions about this product</h4>
					<a href="#" class="submit-question-trigger">Submit Here</a>
				</div>
				<div class="download-pdf">
					<h4>Download Catalog PDF's</h4>
					<ul>
						<li>
							<?php if( get_field('product_byler_rivet_pdf') ): ?>
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" />
								<a href="<?php the_field('product_byler_rivet_pdf'); ?>" target="_blank" >Byler Rivet</a>

							<?php endif; ?>
						</li>
						<li>
							<?php if( get_field('product_brochure_pdf') ): ?>
							<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" />
								<a href="<?php the_field('product_brochure_pdf'); ?>" target="_blank" >Byler Rivet Manuals</a>

							<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
			<?php
				if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

				global $post, $product;

				$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
				$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
				?>
				<div class="product_meta_category">
					<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', ' <a href="/products/#browse-all-categories" class="spacer">Browse all categories</a></span><br/> ' ); ?>
					
					<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( '<strong>Tag</strong>:', '<strong>Tags</strong>:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>
				</div>

	</div><!-- .summary -->
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
