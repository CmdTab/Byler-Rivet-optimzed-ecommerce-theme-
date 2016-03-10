<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;

 /*woo_footer_top();
 	woo_footer_before();*/
?>
	

	<?php woo_footer_after(); ?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->

	<footer id="footer" class="col-full footer">
		<div class="footer-contact group">
			<div class="contact-box group">
				<?php the_field('footer_contact' , 'option'); ?>
			</div>
			<?php 
				if( have_rows('footer_menu', 'option') ):
				while ( have_rows('footer_menu', 'option') ) : the_row();
			?>
			<div class="contact-box group">
				<h3><?php the_sub_field('footer_title'); ?></h3>
				<?php if( have_rows('foot_item', 'option') ): ?>
				<ul>
					<?php while ( have_rows('foot_item', 'option') ) : the_row(); ?>
					<li>
						<a href="<?php the_sub_field('foot_url'); ?>">
							<?php the_sub_field('foot_text'); ?>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endwhile; endif; ?>
		</div>
		<div class="footer-copyright group">
			<div class="half first language-numbers">
				<!--<div class="english">
					<a href="#">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/images/phone-icon.png" />
						<span><?php the_field('footer_number_1' , 'option'); ?></span>
						<p>English</p>
					</a>
				</div>-->
				<div class="spanish">
					<a href = "#"><?php the_field('contact_number' , 'option'); ?></a>
				</div>
			</div>
			<div class="half site-copyright">
				<?php the_field('copyright' , 'option'); ?>
			</div>

			<!-- <div class="half contact-mobile">
				<div class="second group">
					<section class="english">
						<img src="<?php // echo get_bloginfo('template_directory'); ?>/images/phone-icon.png" />
						<a href="#"><span>800-325-3147</span>
						</a>
					</section>
					<section class="spanish">
						<img src="<?php // echo get_bloginfo('template_directory'); ?>/images/phone-icon.png" />
						<a href="#"><span>1-972-986-6792</span><br />
							Se Hablas Espanol
						</a>
					</section>
				</div>
			</div>
			<div class="half first contact-mobile group">
				<img src="<?php // echo get_bloginfo('template_directory'); ?>/images/byler-logo-white.png" />
				<p>Copyright 2015 Byler Rivet Supply<br />
					Website Credits
				</p>
			</div>-->
		</div>


		<!-- <?php woo_footer_inside(); ?>

		<div id="copyright" class="col-left">
			<?php woo_footer_left(); ?>
		</div>

		<div id="credit" class="col-right">
			<?php woo_footer_right(); ?>
		</div>-->

	</footer>
	<div class="modalVideo"><div class="modalContent"></div><a href = "#" class="hideModal">Close</a></div>
<div class="fix"></div><!--/.fix-->

<?php wp_footer(); ?>
<?php woo_foot(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/_js/min/functions-min.js"></script>
</body>
</html>