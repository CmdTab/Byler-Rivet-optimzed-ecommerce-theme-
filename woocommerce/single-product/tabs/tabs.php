<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">
		<!-- <ul class="tabs">
			<?php // foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php // echo $key ?>_tab">
					<a href="#tab-<?php // echo $key ?>"><?php // echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php // endforeach; ?>
		</ul>
		<?php // foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php // echo $key ?>">
				<?php // call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>

		<?php // endforeach; ?> -->
		
		<div id="new_tabs" class="woocommerce-tabs new-tabs">
			<ul class="tabs group">
				<a href = "#" class="tab-toggle btn">
					<span class="fa fa-bars"></span>
					<b>Show More</b>
				</a>
			   <li><a href="#description" class="first-tab">Description</a></li>
			   <li><a href="#key_specs">Key Specs</a></li>
			   <li><a href="#manuals">Manuals</a></li>
			   <li><a href="#reviews">Reviews (0)</a></li>
			   <li><a href="#videos" class="testing-hide">Videos</a></li>
			   <li><a href="#warranty">Warranty</a></li>
			</ul>
		  	<div id="description" class="panel entry-content group">
		  		<div class="prod-description sixty">
					<h2>Product Description</h2>

					<?php echo the_content(); ?>
				</div>
				<div class="prod-para forty">
					<h2>Product Parameters</h2>
					<ul class="grey-box">

						<table class="shop_attributes mfr-part">
							<tr>
								<th>MFR Part No.</th>
								<td>
									<p><?php the_field('manufacturer_brand_part_number'); ?></p>
								</td>
							</tr>
						</table>
						<?php
						global $product;
						$product->list_attributes();
						?>
					<?php 
						// var_dump($product->get_attributes());
					?>

					</ul>
				</div>
		  	</div>
		  	<div id="key_specs" class="panel entry-content prod-para key-specs">
				<h2>Product Parameters</h2>
				<ul class="grey-box">
					<table class="shop_attributes mfr-part">
						<tr>
							<th>MFR Part No.</th>
							<td>
								<p><?php the_field('manufacturer_brand_part_number'); ?></p>
							</td>
						</tr>
					</table>
					<?php
						global $product;
						$product->list_attributes();
						?>
						
					<?php 
						// var_dump($product->get_attributes());
					?>

				</ul>
		 	</div>
		 	<div id="manuals" class="panel entry-content group manuals">

		 		<div class="sixty">
		 			<h2>Product Manual</h2>
			 		<?php if( get_field('product_manual_pdf') ): ?>
						
						<div class="download-manual">
							<a href="<?php the_field('product_manual_pdf'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" />
								Manual #1
							</a>
						</div>

						<?php endif; ?>

						<?php if( get_field('product_manual_pdf_2') ): ?>
						
						<div class="download-manual">
							<a href="<?php the_field('product_manual_pdf_2'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" class="pdf-icon" />
								Manual #2
							</a>
						</div>

						<?php endif; ?>

						<?php if( get_field('product_manual_pdf_3') ): ?>
						
						<div class="download-manual">
							<a href="<?php the_field('product_manual_pdf_3'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" class="pdf-icon" />
								Manual #3
							</a>
						</div>

						<?php endif; ?>
				</div>
				<div class="forty">
					<h2>Product Brochure</h2>
					<div class="grey-box">
						<?php if( get_field('product_byler_rivet_pdf') ): ?>
				 		
				 		<div class="download-manual">	
							<a href="<?php the_field('product_byler_rivet_pdf'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" class="pdf-icon" />
								Brochure #1
							</a>
						</div>

						<?php endif; ?>

						<?php if( get_field('product_brochure_pdf') ): ?>
						
						<div class="download-manual">
							<a href="<?php the_field('product_brochure_pdf'); ?>" target="_blank">
								<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" class="pdf-icon" />
								Brochure #2
							</a>
						</div>

						<?php endif; ?>
					</div>
				</div>

		 	</div>
		 	<div id="reviews" class="panel entry-content reviews">
		 		
		 		<?php comments_template(); ?> 

		  	</div>
		  	
		  	 	
		  	 	<?php

					// load all 'category' terms for the post
		  	 		$prod_vid = get_field('product_youtube_video_url');
					$terms = get_the_terms( get_the_ID(), 'product_cat');
					$prod_vid_title = get_field('product_youtube_title');

					// we will use the first term to load ACF data from
					if( !empty($terms) ) {
						
						$term = array_pop($terms);

						$cat_vid = get_field('category_video' , $term );
						$cat_vid_title = get_field('cat_vid_title' , $term);

					}

		  	 		if ($cat_vid !== '' && $prod_vid !== '') { 

		  	 			echo '<div id="videos" class="panel entry-content group">';
		  	 			echo '<div class="category-vid-title half">' . $cat_vid_title . '</div>';
		  	 			echo '<div class="product-vid-title half">' . $prod_vid_title . '</div>';
		  	 			echo $cat_vid;
		  	 			echo '<div class="product-vid-title mobile">' . $prod_vid_title . '</div>';
		  	 			echo $prod_vid;
		  	 			echo '</div>';

					} else if ($cat_vid !== '') {

						echo '<div id="videos" class="panel entry-content group">';
						echo '<div class="category-vid-title">' . $cat_vid_title . '</div>';
						echo $cat_vid;
						echo '</div>';
					
					}  else if ($prod_vid !== '') {

						echo '<div id="videos" class="panel entry-content group">';
						echo '<div class="product-vid-title">' . $prod_vid_title . '</div>';
						echo $prod_vid;
						echo '</div>';
					
					} else {

						return false;

					}

				?>

		 	<div id="warranty" class="panel entry-content group warranty">
		 		<div class="sixty">
			 		<h2>Our Warranty</h2>
			 	   <?php the_field('product_warranty_info'); ?>
			 	</div>
		 	   <div class="forty">
		 	   	<h2>Download Warranty</h2>
		 	   	<div class="grey-box">
			 	   	<?php if( get_field('product_warranty_document') ): ?>
				 	   	<a href="<?php the_field('product_warranty_document'); ?>" target="_blank">
				 	   		<img src="<?php echo get_bloginfo('template_directory'); ?>/images/pdf.png" class="pdf-icon" />
				 	   		Warranty PDF
				 	   	</a>
		 	   		<?php endif; ?>
		 	   	</div>
	 	   	</div>
		 	</div>
		</div>
	</div>


<?php endif; ?>