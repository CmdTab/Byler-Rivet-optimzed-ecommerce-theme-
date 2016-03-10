<?php
/**
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 /*
Template Name: Home Page 032015
*/

get_header();
?>     
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full group">
    
    	  
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
        <section class="main-content">
<?php
	woo_loop_before();
	
	if (have_posts()) { $count = 0;
		while (have_posts()) { the_post(); $count++;
			woo_get_template_part( 'content', 'page-home' ); // Get the page content template file, contextually.
		}
	}
	
	woo_loop_after();
?>     
        </section><!-- /#main -->
            <?php woo_main_after(); ?>
    	<div class="sidebar">
	    	<?php get_sidebar(); ?>
	    	<?php get_sidebar( 'alt' ); ?>
	    	<div>
	    		<h4>Rivets &amp; Tools</h4>
	    		<p>Our enormous inventory provides you with options: dependability, fast service and price savings, as well as decreased downtime!</p>
	    	</div>
    	</div><!-- /#main-sidebar-container -->
    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>

<?php 

remove_action( 'woo_footer_top', 'woo_footer_sidebars', 30 );


?>