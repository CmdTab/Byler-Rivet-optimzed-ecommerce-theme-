<?php
/**
 * Sidebar Template
 *
 * If a `primary` widget area is active and has widgets, display the sidebar.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $post, $wp_query, $woo_options;

?>

			<div class="sidebar">
                <?php woo_sidebar( 'primary' ); ?>
                <?php 
                    if( have_rows('add_sidebar_widget') ): 
                    while ( have_rows('add_sidebar_widget') ) : the_row();
                    if( get_row_layout() == 'global_widget' ):
                ?>
                <div class="widget">
                <?php if( get_sub_field('which_widget') == 'intro' ) : ?>
                    <div class="intro-widget">
                        <h4><?php the_field('header_text' , 'option'); ?></h4>
                        <p><?php the_field('message_text' , 'option'); ?></p>
                    </div>
                <?php elseif( get_sub_field('which_widget') == 'repair' ) : ?>
                    <div class="tool-repair-widget gradient">
                        <?php 
                            $tool_repair_image = get_field('background_image' , 'option');
                        ?>
                        <img src="<?php echo $tool_repair_image['url']; ?>" alt="<?php echo $tool_repair_image['alt']; ?>" />
                        <div class="widget-content">
                            <h4><?php the_field('widget_1_header' , 'option'); ?></h4>
                            <h2><?php the_field ('widget_1_bottom_text' , 'option'); ?> <b><img src="<?php echo get_bloginfo('template_directory'); ?>/images/phone-icon.png" /> <?php the_field('widget_1_bottom_number' , 'option'); ?></b></h2>
                        </div>
                    </div>
                <?php elseif( get_sub_field('which_widget') == 'support' ) : ?>
                    <div class="product-support-widget gradient">
                        <?php 
                            $product_support_image = get_field('widget2_background_image' , 'option');
                            $tool_image = get_field('widget2_background_image2' , 'option');
                        ?>
                        <img src="<?php echo $product_support_image['url']; ?>" alt="<?php echo $product_support_image['alt']; ?>" />
                        <div class="arrow-down">
                        </div>
                        <div class="widget-content gradient">
                            <!-- <?php // the_field('widget_links' , 'option'); ?> -->
                                <ul>
                                    <li>
                                        <a href = "#">Product Brochures
                                            <span class="fa fa-chevron-circle-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "#">Schematics
                                            <span class="fa fa-chevron-circle-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "#">Manuals
                                            <span class="fa fa-chevron-circle-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "#">FAQs
                                            <span class="fa fa-chevron-circle-right"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "#">Videos
                                            <span class="fa fa-chevron-circle-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            <img src="<?php echo $tool_image['url']; ?>" alt="<?php echo $tool_image['alt']; ?>" class="product-tool" />
                        </div>
                    </div>
                <?php elseif( get_sub_field('which_widget') == 'catalog' ) : ?>
                    <div class="register-now-widget gradient">
                        <?php 
                            $free_catalog_image = get_field('widget_background3' , 'option');
                        ?>
                        <img src="<?php echo $free_catalog_image['url']; ?>" alt="<?php echo $free_catalog_image['alt']; ?>" />
                        <a href="#" class="sidebar-btn"><?php the_field('widget_bottom_text' , 'option'); ?>
                            <span class="fa fa-chevron-circle-right"></span>
                        </a>
                    </div>
                <?php elseif( get_sub_field('which_widget') == 'slider' ) : ?>
                    <div class="featured-brands-widget">
                        <h1><?php the_field('sidebar_widget4_header' , 'option'); ?></h1>
                        <div id="carousel-featured-brands" class="carousel slide" data-ride="carousel" data-interval="false">
                            <!-- Wrapper for slides -->
                            <?php if( have_rows('featured_brands' , 'option') ): $img_count=1; ?>

                            <div class="carousel-inner" role="listbox">

                                <?php while( have_rows('featured_brands' , 'option') ): the_row(); if ($img_count == 1) {

                                // vars
                                    // $brand_image = get_sub_field('brand_image' , 'option');
                                    // $brand_name = get_sub_field('brand_name' , 'option');
                                    // $brand_description = get_sub_field('brand_description' , 'option');

                                ?>

                                <div class="item active">
                                    <a href="#">
                                        <img src="<?php the_sub_field('brand_image' , 'option'); ?>" alt="...">
                                        <!-- <h1>Rivets</h1> -->
                                    </a>
                                    <div class="carousel-caption">
                                        <h4><?php the_sub_field('brand_name' , 'option'); ?></h4>
                                        <p><?php the_sub_field('brand_description' , 'option'); ?></p>
                                    </div>
                                </div>

                                <?php } else {?> 

                                <div class="item">
                                    <a href="#">
                                        <img src="<?php the_sub_field('brand_image' , 'option'); ?>" alt="...">
                                        <!-- <h1>Rivets</h1> -->
                                    </a>
                                    <div class="carousel-caption">
                                        <h4><?php the_sub_field('brand_name' , 'option'); ?></h4>
                                        <p><?php the_sub_field('brand_description' , 'option'); ?></p>
                                    </div>
                                </div>

                                <?php } $img_count++; ?> 

                                <?php endwhile; ?>

                            </div>

                            <?php endif; ?>
                            <div class="carousel-controls">
                                <a class="left carousel-control" href="#carousel-featured-brands" role="button" data-slide="prev">
                                    <span class="fa fa-chevron-circle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-featured-brands" role="button" data-slide="next">
                                    <span class="fa fa-chevron-circle-right"></span>
                                </a>
                            </div>
                        <!-- Controls -->
                        </div>
                        <!-- Carousel -->
                        <a href="#" class="sidebar-btn"><?php the_field('view_more_text' , 'option'); ?>
                            <span class="fa fa-chevron-circle-right"></span>
                        </a>
                    </div>
                <?php elseif( get_sub_field('which_widget') == 'newsletter' ) : ?>
                    <div class="newsletter-widget">
                        <h1 class="sidebar-btn">Newsletter
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/newsletter-icon.jpg" />
                        </h1>
                        <div class="text-fields">
                            <input type="text" name="input" value="Name*">
                            <input type="text" name="input" value="Email*">
                            <p>*Required Fields</p>
                            <a href="#" class="btn">Sign Up Now</a>
                        </div>
                    </div>
                
                <?php endif; ?>
                </div>
                <?php 
                    elseif( get_row_layout() == 'menu_widget' ):
                    $menuID = get_sub_field('which_menu'); ?>
                <div class="widget">
                    <?php wp_nav_menu( array('menu' => $menuID )); ?>
                </div>
                <?php elseif( get_row_layout() == 'custom_widget' ): ?>
                <div class="widget">
                    <?php the_sub_field('widget_content'); ?>
                </div>
                <?php elseif( get_row_layout() == 'manufacturer_slider_sidebar' ): ?>
                    <div class="widget">
                        <?php get_template_part( 'content', 'manufacturer' ); ?>
                    </div>
                    
                <?php endif; endwhile; endif; ?>
            </div><!--sidebar-->