<?php if( have_rows('m_item', 'option') ): ?>
	<div class="shortcode-tabs product-menu group" id="product-menu">
		<!-- <a href="#" id="closeProducts" class="close-products">Close</a> -->
		<ul class="product-type-list">
			<?php $i = 1; while ( have_rows('m_item', 'option') ) : the_row(); ?>
			<li>
				<a href = "#menu<?php echo $i; ?>">
					<?php $post_object = get_sub_field('m_select'); echo $post_object->post_title;?>
				</a>
			</li>
			<?php $i++; endwhile; ?>
		</ul>
		<?php 
			$j = 1;
			while ( have_rows('m_item', 'option') ) : the_row();
				$menu_item = get_sub_field('m_select');
		?>
		<div id="menu<?php echo $j; ?>" class="menu-content-container">
			<?php if( get_sub_field('m_style', 'option') == 'just_cat' ): ?>
			<div class="menu-content group">
				<?php if( have_rows('m_cat_item', $menu_item->ID) ): ?>
				<ul class="menu-cat-list four-list group">
				<?php while ( have_rows('m_cat_item', $menu_item->ID) ) : the_row(); ?>
					<li>
						<?php 
							$cat = get_sub_field('m_cat');
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
									echo '<img src = "http://placehold.it/250x250">';
								}
							?>
							</div>
							<span class="menu-cat-text">
								<?php 
									if(get_sub_field('m_alt_option')):
										the_sub_field('m_alt_title');
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
			<?php elseif(get_sub_field('m_style', 'option') == 'cat_links' ): ?>
			<div class="menu-content overflow group">
				<?php if( have_rows('m_cat_item', $menu_item->ID) ): ?>
				<ul class="menu-cat-list three-list wide group">
				<?php $k = 1; while ( have_rows('m_cat_item', $menu_item->ID) && $k < 7 ) : the_row(); ?>
					<li>
						<?php 
							$cat = get_sub_field('m_cat');
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
									echo '<img src = "http://placehold.it/250x250">';
								}
							?>
							</div>
							<span class="menu-cat-text">
								<?php 
									if(get_sub_field('m_alt_option')):
										the_sub_field('m_alt_title');
									else :
										echo $term->name; 
									endif;
								?>
							</span>
						</a>
						<?php endif; ?>
					</li>
				<?php $k++; endwhile; ?>
				</ul>
				<?php endif; ?>
				<!--***SomethingHere***-->
				<div class="overflow-links">
					<h4>Related Products</h4>
					<?php if( have_rows('m_extra_links', $menu_item->ID) ): ?>
					<ul>
						<?php while ( have_rows('m_extra_links', $menu_item->ID) ) : the_row(); ?>
						<li>
							<a href = "<?php the_sub_field('m_link_url'); ?>">
								<?php the_sub_field('m_link_text'); ?>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
					<?php if( have_rows('m_extra_logos', $menu_item->ID) ): ?>
					<div class="overflow-logos group">
						<?php while ( have_rows('m_extra_logos', $menu_item->ID) ) : the_row(); ?>
						<a href = "<?php the_sub_field('m_logo_url'); ?>">
							<?php 
							$ofimage = get_sub_field('m_logo_image');
							if( !empty($ofimage) ): ?>
								<img src="<?php echo $ofimage['url']; ?>" alt="<?php echo $ofimage['alt']; ?>" />
							<?php endif; ?>
						</a>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
				<!--Something above-->
			</div>
			<?php elseif(get_sub_field('m_style', 'option') == 'cat_bot_ad' ): ?>
			<div class="menu-content group">
				<?php if( have_rows('m_cat_item', $menu_item->ID) ): ?>
				<ul class="menu-cat-list four-list wide group">
				<?php $k = 1; while ( have_rows('m_cat_item', $menu_item->ID) && $k < 9 ) : the_row(); ?>
					<li>
						<?php 
							$cat = get_sub_field('m_cat');
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
									echo '<img src = "http://placehold.it/250x250">';
								}
							?>
							</div>
							<span class="menu-cat-text">
								<?php 
									if(get_sub_field('m_alt_option')):
										the_sub_field('m_alt_title');
									else :
										echo $term->name; 
									endif;
								?>
							</span>
						</a>
						<?php endif; ?>
					</li>
				<?php $k++; endwhile; ?>
				</ul>
				<?php endif; ?>
				<div class="product-ad-bottom">
					<?php
						$ad = get_field('m_bottom_ad', $menu_item->ID);
						$adlink = get_field('m_bottom_link', $menu_item->ID);
						if( !empty($adlink) ):
					?>
					<a href = "<?php echo $adlink; ?>">
					<?php endif; ?>
					<img src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>" />
					<?php if( !empty($adlink) ): ?></a><?php endif; ?>
				</div>
			</div>
		<?php elseif(get_sub_field('m_style', 'option') == 'cat_right_ad' ): ?>
			<div class="menu-content group">
				<?php if( have_rows('m_cat_item', $menu_item->ID) ): ?>
				<div class="half first">
					<ul class="menu-cat-list two-list wide group">
					<?php $k = 1; while ( have_rows('m_cat_item', $menu_item->ID) && $k < 7 ) : the_row(); ?>
						<li>
							<?php 
								$cat = get_sub_field('m_cat');
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
										echo '<img src = "http://placehold.it/250x250">';
									}
								?>
								</div>
								<span class="menu-cat-text">
									<?php 
										if(get_sub_field('m_alt_option')):
											the_sub_field('m_alt_title');
										else :
											echo $term->name; 
										endif;
									?>
								</span>
							</a>
							<?php endif; ?>
						</li>
					<?php $k++; endwhile; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="product-ad half">
					<?php
						$ad = get_field('m_right_ad', $menu_item->ID);
						$adlink = get_field('m_right_link', $menu_item->ID);
						if( !empty($adlink) ):
					?>
					<a href = "<?php echo $adlink; ?>">
					<?php endif; ?>
					<img src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>" />
					<?php if( !empty($adlink) ): ?></a><?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php $j++; endwhile; ?>
	</div>
<?php endif; ?>