<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php wp_head(); ?>
<?php woo_head(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/josh.css">
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700|Oswald:400,700' rel='stylesheet' type='text/css'>
<div id="wrapper">

	<div id="inner-wrapper">

	<?php woo_header_before(); ?>

	<header id="header" class="col-full">

		<?php //woo_header_inside(); ?>
		<a href = "#" id="toggleNav" class="toggle-nav">Menu</a>
		<!--<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" id="productMobile" class="product-trigger-mobile">
			Products
		</a>-->
	</header>
	<nav class="main-nav group">
		<ul id="main-navigation" class="main-navigation menu group">
			<li>
				<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" class="home">
					<span class="fa fa-home"></span>
				</a>
			</li>
			<li>
				<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" id="productTrigger" class="product-trigger-desktop">
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
	<?php //woo_header_after(); ?>