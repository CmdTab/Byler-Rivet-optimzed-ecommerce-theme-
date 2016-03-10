<?php if( have_rows('menu_item', 'option') ): ?>
	<div class="shortcode-tabs product-menu group" id="product-menu">
		<!-- <a href="#" id="closeProducts" class="close-products">Close</a> -->
		<ul class="product-type-list">
			<?php $i = 1; while ( have_rows('menu_item', 'option') ) : the_row(); ?>
			<li>
				<a href = "#menu<?php echo $i; ?>">
					<?php the_sub_field('type_name'); ?>
				</a>
			</li>
			<?php $i++; endwhile; ?>
		</ul>
		<?php $j = 1; while ( have_rows('menu_item', 'option') ) : the_row(); ?>
		<div id="menu<?php echo $j; ?>" class="menu-content-container">
			<?php if( have_rows('menu_content') ): ?>
			<?php while ( have_rows('menu_content') ) : the_row(); ?>
				
				<?php if( get_row_layout() == 'basic_categories' ): ?>
				<div class="menu-content group">
					<?php if( have_rows('category_link') ): ?>
					<ul class="menu-cat-list four-list group">
					<?php while ( have_rows('category_link') ) : the_row(); ?>
						<li>
							<?php 
								$cat = get_sub_field('category');
								$term = get_term($cat, 'product_cat');
								if( $term ):
							?>
							<a href = "<?php echo get_term_link( $term ); ?>">
								<div class="menu-cat-image">
								<?php
									$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
									$image = wp_get_attachment_url( $thumbnail_id );
									if ( $image ) {
									    echo '<img src="' . $image . '" alt="" />';
									} else {
										/*echo '<img src = "'. get_bloginfo('template_directory') . '/images/placeholder.jpg">';*/
										echo '<img src = "http://placehold.it/250x250">';
									}
								?>
								</div>
								<span class="menu-cat-text">
									<?php 
										if(get_sub_field('add_alt')):
											the_sub_field('alt_title');
										else :
											echo $term->name; 
										endif;
									?>
								</span>
							</a>
							<?php endif; ?>
						</li>
					<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>
				<?php elseif( get_row_layout() == 'categories_with_of' ): ?>
				<div class="menu-content overflow group">
					<?php if( have_rows('of_link') ): ?>
					<ul class="menu-cat-list three-list wide group">
					<?php while ( have_rows('of_link') ) : the_row(); ?>
						<li>
							<?php 
								$cat = get_sub_field('of_cat');
								$term = get_term($cat, 'product_cat');
								if( $term ):
							?>
							<a href = "<?php echo get_term_link( $term ); ?>">
								<div class="menu-cat-image">
								<?php
									$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
									$image = wp_get_attachment_url( $thumbnail_id );
									if ( $image ) {
									    echo '<img src="' . $image . '" alt="" />';
									} else {
										/*echo '<img src = "'. get_bloginfo('template_directory') . '/images/placeholder.jpg">';*/
										echo '<img src = "http://placehold.it/250x250">';
									}
								?>
								</div>
								<span class="menu-cat-text">
									<?php 
										if(get_sub_field('add_alt')):
											the_sub_field('alt_title');
										else :
											echo $term->name; 
										endif;
									?>
								</span>
							</a>
							<?php endif; ?>
						</li>
					<?php endwhile; ?>
					</ul>
					<?php endif; ?>
					<?php if( have_rows('of_links') ): ?>
					<div class="overflow-links">
						<h4>Related Products</h4>
						<ul>
							<?php while ( have_rows('of_links') ) : the_row(); ?>
							<li>
								<a href = "<?php the_sub_field('of_url'); ?>">
									<?php the_sub_field('of_text'); ?>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php if( have_rows('of_logos') ): ?>
						<div class="overflow-logos group">
							<?php while ( have_rows('of_logos') ) : the_row(); ?>
							<a href = "<?php the_sub_field('of_logo_link'); ?>">
								<?php 
								$ofimage = get_sub_field('of_logo_image');
								if( !empty($ofimage) ): ?>
									<img src="<?php echo $ofimage['url']; ?>" alt="<?php echo $ofimage['alt']; ?>" />
								<?php endif; ?>
							</a>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						<!--<?php 
						$botimage = get_sub_field('of_bottom_image');
						if( !empty($botimage) ): ?>
							<img src="<?php echo $botimage['url']; ?>" alt="<?php echo $botimage['alt']; ?>" class="bottom-overflow"/>
						<?php endif; ?>-->
					</div>
					<?php endif; ?>
				</div>
				<?php elseif( get_row_layout() == 'categories_with_ad_bottom' ): ?>
					<?php 
						$ad = get_sub_field('ad_image');
					?>
					<div class="menu-content group">
						<?php if( have_rows('ad_link') ): ?>
						<ul class="menu-cat-list four-list group">
						<?php while ( have_rows('ad_link') ) : the_row(); ?>
							<li>
								<?php 
									$cat = get_sub_field('ad_cat');
									$term = get_term($cat, 'product_cat');
									if( $term ):
								?>
								<a href = "<?php echo get_term_link( $term ); ?>">
									<div class="menu-cat-image">
									<?php
										$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
										$image = wp_get_attachment_url( $thumbnail_id );
										if ( $image ) {
										    echo '<img src="' . $image . '" alt="" />';
										} else {
											echo '<img src = "'. get_bloginfo('template_directory') . '/images/placeholder.jpg">';
										}
									?>
									</div>
									<span class="menu-cat-text">
										<?php 
											if(get_sub_field('add_alt')):
												the_sub_field('alt_title');
											else :
												echo $term->name; 
											endif;
										?>
									</span>
								</a>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<div class="product-ad-bottom">
							<?php
							$adlink = get_sub_field('ad_url');
							if( !empty($adlink) ): ?>
							<a href = "<?php echo $adlink; ?>">
							<?php endif; ?>
							<img src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>" />
							<?php if( !empty($adlink) ): ?></a><?php endif; ?>
						</div>
					</div>
					<?php elseif( get_row_layout() == 'categories_with_ad_right' ): ?>
						<?php 
							$ad = get_sub_field('ad_image_right');
						?>
						<div class="menu-content group">
							<?php if( have_rows('ad_link_right') ): ?>
							<div class="half first">
								<ul class="menu-cat-list two-list wide group">
								<?php while ( have_rows('ad_link_right') ) : the_row(); ?>
									<li>
										<?php 
											$cat = get_sub_field('ad_cat');
											$term = get_term($cat, 'product_cat');
											if( $term ):
										?>
										<a href = "<?php echo get_term_link( $term ); ?>">
											<div class="menu-cat-image">
											<?php
												$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
												$image = wp_get_attachment_url( $thumbnail_id );
												if ( $image ) {
												    echo '<img src="' . $image . '" alt="" />';
												} else {
													echo '<img src = "'. get_bloginfo('template_directory') . '/images/placeholder.jpg">';
												}
											?>
											</div>
											<span class="menu-cat-text">
												<?php 
													if(get_sub_field('add_alt')):
														the_sub_field('alt_title');
													else :
														echo $term->name; 
													endif;
												?>
											</span>
										</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
								</ul>
							</div>
							<?php endif; ?>
							<div class="product-ad half">
								<?php
								$adlink = get_sub_field('ad_url_right');
								if( !empty($adlink) ): ?>
								<a href = "<?php echo $adlink; ?>">
								<?php endif; ?>
								<img src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>" />
								<?php if( !empty($adlink) ): ?></a><?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php $j++; endwhile; ?>
	</div>
<?php endif; ?>