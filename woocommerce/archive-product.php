<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
	<?php do_action('woo_custom_breadcrumb'); ?>
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php 
			$queried_object = get_queried_object(); 
			$taxonomy = $queried_object->taxonomy;
			$term_id = $queried_object->term_id;
			$thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
		    $image = wp_get_attachment_url( $thumbnail_id );
		?>
		<div class="archive-detail group <?php if(get_field('hide_image_in_list', $taxonomy . '_' . $term_id)) {echo 'with-image';} ?>">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		
		<?php endif; ?>
		
		<?php if(get_field('hide_image_in_list', $taxonomy . '_' . $term_id)) {echo '<img src = "' . $image . '" class="archive-image" />';} ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>
		<?php do_action( 'woocommerce_before_shop_loop' ); ?>
		</div>
		<?php if ( have_posts() ) : ?>
			
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				//do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php //woocommerce_product_loop_start(); ?>
				<?php 
					if(get_term_children( get_queried_object()->term_id, 'product_cat' )) {
						echo '<div class="sub-categories">';
							//do_action( 'woocommerce_before_shop_loop' );
							woocommerce_product_loop_start();
							woocommerce_product_subcategories();
							woocommerce_product_loop_end();

							//do_action( 'woocommerce_after_shop_loop' );
						echo '</div>';
					} else {
						echo '<div class="prod-listing">';
						
						woocommerce_product_loop_start();
						while ( have_posts() ) : the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
						woocommerce_product_loop_end();
						do_action( 'woocommerce_after_shop_loop' );
						echo '</div>';
					}
				?>


			<?php //woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				//do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>