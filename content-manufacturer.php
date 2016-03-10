<?php if( have_rows('manufacturer_slider', 'option') ): ?>
<div class="manufacturer-list">
    <h3>Manufacturers</h3>
	<div class="box-shadow bottom-shadow">
		<div class="slider1">
			<?php while ( have_rows('manufacturer_slider', 'option') ) : the_row(); ?>
			<div class="slide">
				<?php if(get_sub_field('m_slide_url')): ?>
				<a href = "<?php the_sub_field('m_slide_url'); ?>">
				<?php endif; ?>
				<?php 
				$image = get_sub_field('m_slide_image');
				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				<?php endif; ?>
				<?php if(get_sub_field('m_slide_url')): ?>
				</a>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>

		</div>
		<div id="slider-next"></div>
		<div id="slider-prev"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/_js/min/jquery.bxslider.min.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('.slider1').bxSlider({
		speed: 14000,
		slideWidth: 150,
		minSlides: 3,
		maxSlides: 8,
		slideMargin: 10,
		moveSlides: 1,
		nextSelector: '#slider-next',
		prevSelector: '#slider-prev',
		ticker: true,
		tickerHover: true,
		useCSS: false,
		pager: false,
		nextText: '<b>Next</b>',
		prevText: '<b>Previous</b>',
	});
});
</script>
<?php endif;?>