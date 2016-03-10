<?php
/**
 * Template Name: Flexible w/ Sidebar
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
?>
       
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
    	<div class="page-container group"> 
            <div class="page-content <?php if(get_field('sidebar_position') == 'right') {echo 'left';} ?>">
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
                               
				<?php
                    woo_loop_before();
                    
                    if (have_posts()) { $count = 0; /*$sidebarMenu =  get_field('flexible_sidebar');*/
                        while (have_posts()) { the_post(); $count++;

                            woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.
                        }
                    }
                    
                    woo_loop_after();
                ?>     
                
            <?php //woo_main_after(); ?>
            </div><!--page-content-->
            
                <?php get_sidebar(); ?>
                <?php //wp_nav_menu(array('menu' => $sidebarMenu )); ?>

		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>