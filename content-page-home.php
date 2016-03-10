	<?php
/**Template Name: Homepage
 *
 * This template is the default page content template. It is used to display the content of the
 * `page.php` template file, contextually, as well as in archive lists or search results.
 *
 * @package WooFramework
 * @subpackage Template
 */

/**
 * Settings for this template file.
 *
 * This is where the specify the HTML tags for the title.
 * These options can be filtered via a child theme.
 *
 * @link http://codex.wordpress.org/Plugin_API#Filters
 */
 global $woo_options;

 $heading_tag = 'h1';
 if ( is_front_page() ) { $heading_tag = 'h2'; }
 $title_before = '<' . $heading_tag . ' class="title entry-title">';
 $title_after = '</' . $heading_tag . '>';

 $page_link_args = apply_filters( 'woothemes_pagelinks_args', array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) );

 woo_post_before();
?>
<div <?php post_class('group'); ?>>
<?php
	woo_post_inside_before();
?>
    
    <div class="main-content">
	    <div id="home-content">
	    	<div id="home-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
				<ol class="carousel-indicators">
					<?php $i = 0; while ( have_rows('home_slide') ) : the_row(); ?>
				
					<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) { echo 'class="active"';} ?>></li>
				
					<?php $i++; endwhile; ?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php $j=0; while ( have_rows('home_slide' ) ) : the_row(); ?>
						<div class="item<?php if($j == 0){echo ' active';} ?>">
							<?php if(get_sub_field('home_slide_url')): ?>
							<a href = "<?php the_sub_field('slide_url'); ?>">
							<?php endif; ?>
							<div class="slide-content"><?php the_sub_field('home_slide_content'); ?></div>
								<?php 
									$image = get_sub_field('home_slide_image');
									if( !empty($image) ):
								?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							<?php if(get_sub_field('home_slide_url')): ?>
							</a>
							<?php endif; ?>
						</div>
					<?php $j++; endwhile; ?>
				</div>
			</div><!--carousel-->
	    	<nav class="main-nav group" id="mobile-home-nav">
				<ul id="main-navigation2" class="main-navigation menu group">
					<li>
						<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" class="home">
							<span class="fa fa-home"></span>
						</a>
					</li>
					<li>
						<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" id="productTrigger2" class="product-trigger-desktop">
							Products
						</a>
						<?php woo_get_template_part( 'content', 'productmenu' ); ?>
					</li>
					<?php 
					if( have_rows('nav_item', 'options') ):
					while ( have_rows('nav_item', 'options') ) : the_row();
						$title = get_sub_field('nav_title');
					if(get_sub_field('nav_add_mega', 'options')) :
						if( have_rows('mega_menu', 'options') ):
						while ( have_rows('mega_menu', 'options') ) : the_row();
						if( get_row_layout() == 'mega_image' ):
					?>
					<li class="with-mega">
						<a href = "#"><?php echo $title; ?></a>
						<div class="mega-menu">
							<div class="mega-content mega-list group">
								<?php if( have_rows('mega_links') ): ?>
								<ul class="brand-list group">
									<?php while ( have_rows('mega_links') ) : the_row(); ?>
									<li>
										<a href = "<?php the_sub_field('mega_brand_url'); ?>">
											<?php 
											$image = get_sub_field('mega_brand_image');
											if( !empty($image) ): ?>
												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											<?php endif; ?>
											<span><?php the_sub_field('mega_brand_name'); ?></span>
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</li>
					<?php elseif( get_row_layout() == 'mega_half_section' ): ?>
					<li class="with-mega">
						<a href = "#"><?php echo $title; ?></a>
						<div class="mega-menu">
							<div class="mega-content mega-basic group">
								<div class="half first wide">
									<div class="group">
										<?php the_sub_field('mega_first_half_content'); ?>
									</div>
								</div>
								<div class="half wide">
									<?php if( have_rows('mega_half_links') ): ?>
									<ul class="mega-links group">
										<?php while ( have_rows('mega_half_links') ) : the_row(); ?>
										<li>
											<a href = "<?php the_sub_field('mega_half_url'); ?>"><?php the_sub_field('mega_half_title'); ?><span class="fa fa-angle-right"></span></a>
										</li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</li>
					<?php elseif( get_row_layout() == 'mega_drop' ): ?>
					<li class="with-mega simple">
						<a href = "#"><?php echo $title; ?></a>
						<div class="mega-menu">
							<div class="mega-content mega-simple-list group">
								<?php if( have_rows('mega_simple') ): ?>
								<ul>
									<?php while ( have_rows('mega_simple') ) : the_row(); ?>
									<li>
										<a href = "<?php the_sub_field('mega_simple_url'); ?>"><?php the_sub_field('mega_simple_text'); ?></a>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</li>
					<?php 
						endif; //get_row_layout
						endwhile; //mega_menu
						endif; //mega_menu
					?>
					<?php else: ?>
					<li>
						<a href = "<?php the_sub_field('nav_url'); ?>"><?php the_sub_field('nav_title'); ?></a>
					</li>
					<?php 
						endif; //nav_add_mega
						endwhile; //nav_item
						endif; //nav_item
					?>
				</ul>
				<div class="mobile-top group">
					<?php woo_top(); ?>
				</div>
				<div class="search-bar">
					<?php get_search_form(); ?>
					<!-- <a href="#" id="searchTrigger" class="search-icon">
						<img src="<?php //echo get_bloginfo('template_directory'); ?>/images/search-icon.jpg" />
					</a> -->
				</div>
				</ul>
			</nav>
	        <?php get_template_part( 'content', 'sections' ); ?>
	    </div>
    </div>
    <?php get_sidebar(); ?>
<?php
	woo_post_inside_after();
?>

</div><!-- /.post -->
<?php woo_get_template_part( 'content', 'manufacturer' ); ?>
<?php
	woo_post_after();
?>