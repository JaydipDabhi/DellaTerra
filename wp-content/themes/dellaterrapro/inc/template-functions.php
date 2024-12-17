<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dellaterrapro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dellaterrapro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'dellaterrapro_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dellaterrapro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'dellaterrapro_pingback_header' );

/**
 * Navigation menu.
 */
function add_nav_menus() {
	register_nav_menus(
		array(
			'nav menu'    => 'Navigation Bar',
			'footer menu' => 'Footer Menu',
		)
	);
}
add_action( 'init', 'add_nav_menus' );

/**
 * ACF Theme option
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();

}

/**
 * Year shortcode.
 */
function year_shortcode() {
	$year = date_i18n( 'Y' );
	return $year;
}
add_shortcode( 'year', 'year_shortcode' );

/**
 * Svg support
 *
 * @param array $mimes array.
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Update Theme.
 */
add_filter( 'auto_update_theme', '__return_false' );

/**
 * Update Plugin.
 */
add_filter( 'auto_update_plugin', '__return_false' );

/**
 * Breadcrumbs.
 *
 * @param array $id array.
 */
function breadcrumbs( $id = null ) {
	$blog_page_url    = get_permalink( get_option( 'page_for_posts' ) );
	$reviews_page_url = get_permalink( get_page_by_path( 'review' ) );
	if ( is_single() && 'post' == get_post_type() ) {
		?>
		<li><a href="<?php echo esc_url( $blog_page_url ); ?>">Blog</a></li>	
		<li><a href="<?php echo get_permalink( $id ); ?>" ><?php the_title(); ?></a> </li>	
	<?php } elseif ( is_single() && 'reviews' == get_post_type() ) { ?>
		<li><a href="<?php echo esc_url( $reviews_page_url ); ?>">Reviews</a></li>
		<li><a href="<?php echo get_permalink( $id ); ?>" ><?php the_title(); ?></a> </li>	
	<?php }
}
