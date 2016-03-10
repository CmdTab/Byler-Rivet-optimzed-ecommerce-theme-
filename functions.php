<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
//define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );	// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 				// Options panel settings and custom settings
				'includes/theme-functions.php', 			// Custom theme functions
				'includes/theme-actions.php', 				// Theme actions & user defined hooks
				'includes/theme-comments.php', 				// Custom comments/pingback loop
				'includes/theme-js.php', 					// Load JavaScript via wp_enqueue_script
				'includes/theme-plugin-integrations.php',	// Plugin integrations
				'includes/sidebar-init.php', 				// Initialize widgetized areas
				'includes/theme-widgets.php',				// Theme widgets
				'includes/theme-advanced.php',				// Advanced Theme Functions
				'includes/theme-shortcodes.php',	 		// Custom theme shortcodes
				'includes/woo-layout/woo-layout.php',		// Layout Manager
				'includes/woo-meta/woo-meta.php',			// Meta Manager
				'includes/woo-hooks/woo-hooks.php'			// Hook Manager
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

/* show log out link in top menu */
add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'top-menu') {
//        $items .= '<li><a href="'. wp_logout_url() .'">Log Out</a></li>';
        $items .= '<li><a href="'. site_url('account/') .'">Account/Log Out</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'top-menu') {
//      	  $items .= '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
   		$items .= '<li><a href="'. site_url('account/') .'">Log In/Register</a></li>';
//      	  $items .= '';
    }
    return $items;
}
/* /show log out link in top menu */

/* search box in primary menu bar */
/* /search box in primary menu bar  */



// Rename tabs fix, Chris
// http://docs.woothemes.com/document/editing-product-data-tabs/
// add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
// function woo_rename_tabs( $tabs ) {
//// $tabs['description']['title'] = __( 'More Information' ); // Rename the description tab
// $tabs['reviews']['title'] = __( 'Customer Reviews' ); // Rename the reviews tab
// $tabs['additional_information']['title'] = __( 'Key <abbr title="Specifications">Specs</abbr>' ); // Rename the additional information tab
// return $tabs;
// } 


// Show empty categories, Chris
// https://github.com/woothemes/woocommerce/issues/6482
// add_filter( �woocommerce_product_subcategories_hide_empty�,
// �__return_false� );

// Set Excerpt Length

    add_filter( 'excerpt_length', 'woo_custom_excerpt_length', 10 );
 
    function woo_custom_excerpt_length ( $length ) {
        $length = 25;
        return $length;
    } // End woo_custom_excerpt_length()


/*
	Josh's Additions
*/
function josh_additions() {
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'byler' ),
	) );
}
add_action( 'after_setup_theme', 'josh_additions' );
//Add Menu Options Page
if( function_exists('acf_add_options_page') ) {

	/*acf_add_options_page('Main Navigation');
	acf_add_options_page('Sidebar Widgets');
	acf_add_options_page('Footer Options');*/
	acf_add_options_page(array(
		'page_title' 	=> 'Global Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Main Navigation',
		'menu_title'	=> 'Main Navigation',
		'parent_slug'	=> 'site-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Global Sidebar Widgets',
		'menu_title'	=> 'Sidebar Widgets',
		'parent_slug'	=> 'site-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Manufacturer Slider',
		'menu_title'	=> 'Manufacturer Slider',
		'parent_slug'	=> 'site-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-options',
	));
}
// Override theme default specification for product # per row
function loop_columns() {
return 3; // 5 products per row
}
add_filter('loop_shop_columns', 'loop_columns', 999);	
/*Change Add to cart on product listing */

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'Add to Quote', 'woocommerce' );
 
}
add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="'.$link.'" class="button view-product">View Product</a>');
}
/*Remove results number*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//Reposition WooCommerce breadcrumb 
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

function woocommerce_custom_breadcrumb(){
    woocommerce_breadcrumb();
}

add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '';
	return $defaults;
}
/*Sort By SKU*/
add_filter('woocommerce_get_catalog_ordering_args', 'wcs_woocommerce_catalog_orderby_sku');
function wcs_woocommerce_catalog_orderby_sku( $args ) {
        $args['orderby'] = 'meta_value';
        $args['meta_key'] = '_sku';
}
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_products_compare_end_point' );

/*Custom Post Types*/
function create_post_type() {
	$menuArgs = array(
		'label'  => 'Menu Items',
		'labels' => array(
			'singular_name' => 'Menu Item'
			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 75,
		'supports' => array('title', 'thumbnail', 'revisions', 'author')
	);
	register_post_type( 'pmenu', $menuArgs );

}
add_action( 'init', 'create_post_type' );



/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
