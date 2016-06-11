<?php
/**
 * Page Content Template
 *
 * This template is the default page content template. It is used to display the content of the
 * `page.php` template file, contextually, as well as in archive lists or search results.
 *
 * @package WooFramework
 * @subpackage Template
 */

/**
 * Settings for this template file.
 *
 * This is where the specify the HTML tags for the title.
 * These options can be filtered via a child theme.
 *
 * @link http://codex.wordpress.org/Plugin_API#Filters
 */
 global $woo_options;

 $heading_tag = 'h1';
 if ( is_front_page() ) { $heading_tag = 'h2'; }
 $title_before = '<' . $heading_tag . ' class="title entry-title">';
 $title_after = '</' . $heading_tag . '>';

 $page_link_args = apply_filters( 'woothemes_pagelinks_args', array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) );

 woo_post_before();
?>
<article <?php post_class(); ?>>
<?php
	woo_post_inside_before();
?>

	<section class="entry">
		<?php wc_print_notices(); ?>

		<div class="account-sidebar group">
			
			<h2>Account Dashboard<!-- Welcome <?php //echo esc_html($current_user->first_name); ?> --></h2>
			<div class="account-navigation group">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>account">Account Dashboard</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-address/billing/">Account Information</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/view-quotes/">View Quotes</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>account/edit-account/">Change Password</a>
			</div>
		</div>
		<div class="account-forms group">
			<div class="account-wrap group">
				<header>
					<h1 class="title entry-title"><?php the_title(); ?></h1>
					<?php
					printf(
				//		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
						__( '<a href="/account/log-out/">(Log Out)</a>', 'woocommerce' ) . ' ',
						$current_user->display_name,
						wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
					);
					?>
				</header>
				<!-- <p class="myaccount_user">
					<?php
					// printf( __( 'From your account dashboard you can view your quote requests, <a href="/account/edit-address/shipping">manage your shipping address</a> and <a href="%s">edit your name, email address or password</a>.', 'woocommerce' ),
					// 	wc_customer_edit_account_url()
					// );
					?>
				</p> -->

				<?php do_action( 'woocommerce_before_my_account' ); ?>

				<?php wc_get_template( 'myaccount/my-orders-view.php' ); ?>

				<?php do_action( 'woocommerce_after_my_account' ); ?>
			</div>
		</div>
	</section><!-- /.entry -->
	<div class="fix"></div>
<?php
	woo_post_inside_after();
?>
</article><!-- /.post -->
<?php
	woo_post_after();
	$comm = get_option( 'woo_comments' );
	if ( ( $comm == 'page' || $comm == 'both' ) && is_page() ) { comments_template(); }
?>