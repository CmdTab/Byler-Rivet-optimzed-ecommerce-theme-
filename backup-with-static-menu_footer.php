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

 woo_footer_top();
 	woo_footer_before();
?>
	<footer id="footer" class="col-full">

		<?php woo_footer_inside(); ?>

		<div id="copyright" class="col-left">
			<?php woo_footer_left(); ?>
		</div>

		<div id="credit" class="col-right">
			<?php woo_footer_right(); ?>
		</div>

	</footer>

	<?php woo_footer_after(); ?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->

<div class="fix"></div><!--/.fix-->

<?php wp_footer(); ?>
<?php woo_foot(); ?>
<script src="/primary-menu/js/jquery.js"></script><!-- jQuery -->
<script src="/primary-menu/js/mgmenu_plugins.js"></script><!-- Mega Menu Plugins -->
<script src="/primary-menu/js/mgmenu.js"></script><!-- Mega Menu Script -->
<script>
$(document).ready(function($){
    $('#mgmenu1').universalMegaMenu({
//      menu_effect: 'hover_fade', // fades menu into view on hover event
		menu_effect: 'open_close_fade', // click to open, fades out
        menu_speed_show: 0, // lower number = faster
        menu_speed_hide: 0,
        menu_speed_delay: 0,
        menu_click_outside: true,
        menubar_trigger : true,
        menubar_hide : false,
        menu_responsive: true
    });
    megaMenuContactForm(); 
});
</script>
</body>
</html>