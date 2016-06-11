<?php
/**
 * Template Name: My Quotes
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
    
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <section id="main">  
                               
                <?php
                    woo_loop_before();
                    
                    if (have_posts()) { $count = 0;
                        while (have_posts()) { the_post(); $count++;
                            woo_get_template_part( 'content', 'quotes' ); // Get the page content template file, contextually.
                        }
                    }
                    
                    woo_loop_after();
                ?>     
                
            </section><!-- /#main -->
            <?php woo_main_after(); ?>
    
            <?php get_sidebar(); ?>

        <?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
    <?php woo_content_after(); ?>

<?php get_footer(); ?>