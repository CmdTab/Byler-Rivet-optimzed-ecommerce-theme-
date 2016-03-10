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

$settings = array(
				'portfolio_layout' => 'one-col'
				);

$settings = woo_get_dynamic_values( $settings );

$layout = woo_get_layout();

// Cater for custom portfolio gallery layout option.
if ( is_tax( 'portfolio-gallery' ) || is_post_type_archive( 'portfolio' ) ) {
	if ( '' != $settings['portfolio_layout'] ) { $layout = $settings['portfolio_layout']; }
}

if ( 'one-col' != $layout ) {
	if ( woo_active_sidebar( 'primary' ) ) {
		woo_sidebar_before();
?>
<aside id="sidebar">

<div id="text-neon-7" class="widget widget_text">
<h3><?php echo the_field('header_text', 'option'); ?></h3>
<div class="textwidget"><?php echo the_field('message_text', 'option'); ?></div>
</div>
        
<div id="text-neon-8" class="widget widget_text">			

<div id="sidebar1" style="background-image:url(<?php echo the_field('background_image', 'option'); ?>);">
<h3><?php echo the_field('widget_1_header', 'option'); ?></h3>
<ul>
	<li><a href="<?php echo the_field('logo_1_url', 'option'); ?>">
    	<img src="<?php echo the_field('logo_1', 'option'); ?>" />
    </a></li>
	<li><a href="<?php echo the_field('logo_2_url', 'option'); ?>">
    	<img src="<?php echo the_field('logo_2', 'option'); ?>" />
    </a></li>
	<li><a href="<?php echo the_field('logo_3_url', 'option'); ?>">
    	<img src="<?php echo the_field('logo_3', 'option'); ?>" />
    </a></li>
</ul>
<div id="sub"><span class="need-quote">Need a quote?</span> <br><span class="call">Call</span> <span class="phone"><?php echo the_field('phone_number', 'option'); ?></span></div>
</div>
</div>


<div id="text-neon-9" >

<div style="height:132px;background-image:url(<?php echo the_field('widget2_background_image', 'option'); ?>);">
	<h3><?php echo the_field('widget_header_2', 'option'); ?></h3>
</div>

<div style="height:164px;background-image:url(<?php echo the_field('widget2_background_image2', 'option'); ?>);">
	<ul>
    	<?php echo the_field('widget_links', 'option'); ?>
    </ul>
    <a href="<?php echo the_field('button_link_url', 'option'); ?>"><div id="vidbutton"><?php echo the_field('button_text', 'option'); ?></div></a>
</div>

</div>

<div id="text-neon-10" class="widget widget_text" style="background-image:url(<?php echo the_field('widget_background3', 'option'); ?>);">
	<h3><?php echo the_field('widget_header', 'option'); ?></h3>
    <p><?php echo the_field('widget_text', 'option'); ?><p>
    <a href="#" class="linker">Register</a>
</div>
        
<?php
	woo_sidebar_inside_before();
	woo_sidebar( 'primary' );
	woo_sidebar_inside_after();
?>
</aside><!-- /#sidebar -->
<?php
		woo_sidebar_after();
	}
}
?>