<?php if( have_rows('content_section') ): ?>
	<?php $c = 0; while ( have_rows('content_section') ) : the_row(); ?>
		<div class="content-section">
			<?php if( get_row_layout() == 'slider' ): ?>
			<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
				<ol class="carousel-indicators">
					<?php $i = 0; while ( have_rows('slide') ) : the_row(); ?>
				
					<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) { echo 'class="active"';} ?>></li>
				
					<?php $i++; endwhile; ?>
				</ol>
				<div class="carousel-inner" role="listbox">

					<?php $j=0; while ( have_rows('slide' ) ) : the_row(); ?>
						<div class="item<?php if($j == 0){echo ' active';} ?>">
							<?php if(get_sub_field('slide_url')): ?>
							<a href = "<?php the_sub_field('slide_url'); ?>">
							<?php endif; ?>
								<div class="slide-content"><?php the_sub_field('slide_content'); ?></div>
								<?php 
									$image = get_sub_field('slide_image');
									if( !empty($image) ):
								?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							<?php if(get_sub_field('slide_url')): ?>
							</a>
							<?php endif; ?>
						</div>
					<?php $j++; endwhile; ?>

				</div>
			</div><!--carousel-->

			<?php elseif( get_row_layout() == 'tabs' ): ?>
			<div class="regular-tabs home-tabs" id="tabs<?php echo $c; ?>">
				<ul>
	                <a href = "#" class="tab-toggle"><span class="fa fa-bars"></span><b>Show More</b></a>
					<?php $t=0; while ( have_rows('tab' ) ) : the_row(); ?>
					<li>
						<a href = "#tab<?php echo $t; ?>">
							<?php the_sub_field('tab_title'); ?>
						</a>
					</li>
					<?php $t++; endwhile; ?>
				</ul>
				<?php $u=0; while ( have_rows('tab' ) ) : the_row(); ?>
				<div id="tab<?php echo $u; ?>" class="popular-products">
					<ul class="product-list three group">
						<?php while ( have_rows('tab_product' ) ) : the_row(); ?>
						<li>
							<a href = "<?php the_sub_field('tab_product_url'); ?>">
								<?php 
									$image = get_sub_field('tab_product_image');
									if( !empty($image) ):
								?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<div class="group">
									<p><?php the_sub_field('tab_product_title'); ?></p>
									<span>View</span>
								</div>
								<?php endif; ?>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php $u++; endwhile; ?>
			</div>
			<?php elseif( get_row_layout() == 'banner' ): ?>
			<div class="thin-banner">
				<a href = "<?php the_sub_field('banner_url'); ?>">
					<?php 
						$image = get_sub_field('banner_image');
						if( !empty($image) ):
					?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</a>
			</div>
			<?php elseif( get_row_layout() == 'grid' ): ?>
			<div class="product-listing">
				<?php 
					$back = get_sub_field('grid_title_background_color');
					$text = get_sub_field('grid_title_color');
				?>
				<h3 style="background: <?php echo $back; ?>; color: <?php echo $text; ?>;"><?php the_sub_field('grid_name'); ?></h3>
				<?php if( have_rows('grid_product' ) ): ?>
				<ul class="product-list four group">
					<?php while ( have_rows('grid_product' ) ) : the_row(); ?>
					<li>
						<a href = "<?php the_sub_field('grid_product_url'); ?>">
							<?php 
								$image = get_sub_field('grid_product_image');
								if( !empty($image) ):
							?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
							<?php the_sub_field('grid_product_title'); ?>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php elseif( get_row_layout() == 'manufacturer_slider_content' ): ?>
				
				<?php get_template_part( 'content', 'manufacturer' ); ?>
				
			<?php endif; ?>
		</div><!--content-section-->
	<?php $c++; endwhile; ?>

<?php endif; ?>