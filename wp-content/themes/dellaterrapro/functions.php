<?php

/**
 * Dellaterrapro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dellaterrapro
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dellaterrapro_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dellaterrapro, use a find and replace
		* to change 'dellaterrapro' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('dellaterrapro', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/**
	 * Define custom constant
	 */
	define('DELLATERRA_TEMPLATEURI', get_template_directory_uri());

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'dellaterrapro'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dellaterrapro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'dellaterrapro_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dellaterrapro_content_width()
{
	$GLOBALS['content_width'] = apply_filters('dellaterrapro_content_width', 640);
}
add_action('after_setup_theme', 'dellaterrapro_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dellaterrapro_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'dellaterrapro'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'dellaterrapro'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'dellaterrapro_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dellaterrapro_scripts()
{
	wp_enqueue_style('dellaterrapro-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_register_style('bootstrap', DELLATERRA_TEMPLATEURI . '/assets/css/bootstrap.min.css', '', _S_VERSION);
	wp_enqueue_style('bootstrap');

	wp_register_style('swiper-css', DELLATERRA_TEMPLATEURI . '/assets/css/swiper-bundle.min.css', '', _S_VERSION);
	wp_enqueue_style('swiper-css');

	wp_register_style('dellaterrapro-custom-style', DELLATERRA_TEMPLATEURI . '/assets/css/style.css', '', _S_VERSION);
	wp_enqueue_style('dellaterrapro-custom-style');

	wp_register_style('dellaterrapro-custom-fancybox', DELLATERRA_TEMPLATEURI . '/assets/css/jquery.fancybox.min.css', '', _S_VERSION);
	wp_enqueue_style('dellaterrapro-custom-fancybox');

	wp_register_script('dellaterrapro-jquery', DELLATERRA_TEMPLATEURI . '/assets/js/jquery-3.7.1.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('dellaterrapro-jquery');

	wp_register_script('dellaterrapro-navigation', DELLATERRA_TEMPLATEURI . '/assets/js/navigation.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('dellaterrapro-navigation');

	wp_register_script('bootstrap', DELLATERRA_TEMPLATEURI . '/assets/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('bootstrap');

	wp_register_script('swiper-js', DELLATERRA_TEMPLATEURI . '/assets/js/swiper-bundle.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('swiper-js');

	wp_register_script('lazysizes-js', DELLATERRA_TEMPLATEURI . '/assets/js/lazysizes.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('lazysizes-js');

	wp_register_script('fancybox-js', DELLATERRA_TEMPLATEURI . '/assets/js/jquery.fancybox.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('fancybox-js');

	wp_register_script('custom-js', DELLATERRA_TEMPLATEURI . '/assets/js/custom.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('custom-js');

	wp_enqueue_script('my-ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js', array('jquery'), null, true);

	wp_localize_script('my-ajax-filter', 'ajaxfilter', array('ajaxurl' => admin_url('admin-ajax.php')));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'dellaterrapro_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Post Type Projects.
 */
require get_template_directory() . '/post-types/reviews.php';

/**
 * Post Type Projects.
 */
require get_template_directory() . '/post-types/projectgallery.php';


/**
 * Post Load More
 */
function filter_posts()
{
	$paged = $_POST['paged'];
	$args  = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'paged'          => $paged,
	);
	if (! empty($_POST['category'])) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $_POST['category'],
			),
		);
	}

	$query = new WP_Query($args);
	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$post_id   = get_the_id();
			$title     = get_the_title($post_id);
			$content   = get_the_content($post_id);
			$content   = wp_trim_words($content, 18, '...');
			$permalink = get_the_permalink($post_id);
			$image     = get_the_post_thumbnail_url($post_id);
			$post_date = get_the_date('M d, Y', $post_id);
?>
			<div class="blogs-box">
				<?php if ($image) : ?>
					<a href="<?php echo esc_url($permalink); ?>" class="blogs-img">
						<picture><img src="<?php echo esc_url($image); ?>"></picture>
					</a>
				<?php endif; ?>
				<div class="blogs-content">
					<?php if ($title) : ?>
						<a href="<?php echo esc_url($permalink); ?>" class="blog-title">
							<h4><?php echo esc_html($title); ?></h4>
						</a>
					<?php endif; ?>
					<?php if ($post_date) : ?>
						<span>
							<picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/time-icon.svg" height="16" width="15"></picture> <?php echo esc_html($post_date); ?>
						</span>
					<?php endif; ?>
					<?php if ($content) : ?>
						<p><?php echo wp_kses_post($content); ?></p>
					<?php endif; ?>
					<a href="<?php echo esc_url($permalink); ?>" class="read-more"><?php echo _e('Read more'); ?><picture><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/right-arrow.svg" height="10" width="6"></picture></a>

				</div>
			</div>
		<?php
		endwhile;
	endif;
	$next_page   = $paged + 1;
	$next_query1 = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'paged'          => $next_page,
	);

	if (! empty($_POST['category'])) {
		$next_query1['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $_POST['category'],
			),
		);
	}

	$next_query     = new WP_Query($next_query1);
	$has_more_posts = $next_query->have_posts();
	wp_send_json(
		array(
			'content'        => ob_get_clean(),
			'has_more_posts' => $has_more_posts,
		)
	);
}
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Review Load More
 */
function filter_review()
{
	$rpaged     = $_POST['rpaged'];
	$query_args = array(
		'post_type'      => 'reviews',
		'post_status'    => 'publish',
		'posts_per_page' => 4,
		'paged'          => $rpaged,
	);
	$query = new WP_Query($query_args);
	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$post_title    = get_the_title($post_id->ID);
			$permalink     = get_permalink($post_id->ID);
			$post_image    = get_the_post_thumbnail_url($post_id->ID);
			$content       = get_the_content($post_id->ID);
			$content       = wp_trim_words($content, 18, '...');
			$date          = get_the_date('M d, Y', $post_id->ID);
			$rating_title  = get_field('rating_title', $post_id->ID);
			$rating_points = get_field('rating_points', $post_id->ID); ?>
			<div class="review-box">
				<div class="pro-name-img">
					<?php if ($post_title): ?>
						<h3 class="review-title"><?php echo esc_html($post_title); ?></h3>
					<?php endif; ?>
					<?php if ($post_image): ?>
						<picture class="pro-img"><img src="<?php echo $post_image; ?>" alt="profile-img" height="60" width="60" /></picture>
					<?php endif; ?>
				</div>
				<?php
				if ($content) :
				?>
					<p class="review-text"><?php echo ($content); ?><a href="<?php echo esc_url($permalink); ?>" title="Read more" class="custom-link">Read more...</a></p>
				<?php
				endif;
				if ($date) :
				?>
					<p class="date"><strong><?php echo esc_html($date); ?></strong></p>
				<?php endif; ?>

				<div class="overall-rating">
					<?php if ($rating_title) : ?>
						<h4><?php echo esc_html($rating_title); ?></h4>
					<?php
					endif;
					if ($rating_points == 1) {
						$points = '1.0';
					} elseif ($rating_points == 2) {
						$points = '2.0';
					} elseif ($rating_points == 3) {
						$points = '3.0';
					} elseif ($rating_points == 4) {
						$points = '4.0';
					} elseif ($rating_points == 5) {
						$points = '5.0';
					}
					?>
					<div class="rateing">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/star-yellow.svg" alt="star-yellow" height="20" width="20" />
						<span><?php echo esc_html($points); ?></span>
					</div>

				</div>
			</div>
		<?php
		endwhile;
	endif;
	$next_page   = $rpaged + 1;
	$next_query1 = array(
		'post_type'      => 'reviews',
		'post_status'    => 'publish',
		'posts_per_page' => 4,
		'paged'          => $next_page,
	);

	$next_query     = new WP_Query($next_query1);
	$has_more_posts = $next_query->have_posts();

	wp_send_json(
		array(
			'content'        => ob_get_clean(),
			'has_more_posts' => $has_more_posts,
		)
	);
}
add_action('wp_ajax_filter_review', 'filter_review');
add_action('wp_ajax_nopriv_filter_review', 'filter_review');

/**
 * Review submit form
 *
 *  @param array $posted_data posteddata for the body element.
 */
function save_posted_data($posted_data)
{

	$form_id = 371;
	$current_form_id = (int) $_POST['_wpcf7'];
	if ($current_form_id === $form_id) {
		$args = array(
			'post_type'    => 'reviews',
			'post_status'  => 'draft',
			'post_title'   => $posted_data['your-name'],
			'post_content' => $posted_data['your-message'],

		);
		$post_id = wp_insert_post($args);

		if (! is_wp_error($post_id)) {
			if (isset($posted_data['your-name'])) {
				update_post_meta($post_id, 'your-name', $posted_data['your-name']);
			}
			if (isset($posted_data['your-email'])) {
				update_field('email', $posted_data['your-email'], $post_id);
			}
			if (isset($posted_data['file-437'])) {
				update_field('property_image', $posted_data['file-437'], $post_id);
			}
			if (isset($_FILES['file-437']) && !empty($_FILES['file-437']['name'])) {


				require_once(ABSPATH . 'wp-admin/includes/image.php');
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				require_once(ABSPATH . 'wp-admin/includes/media.php');

				$attach_id = media_handle_upload('file-437', $post_id);

				if (is_wp_error($attach_id)) {
				} else {
					update_field('property_image', $attach_id, $post_id);
				}
			}
			if (isset($posted_data['text-106'])) {
				update_field('property_name', $posted_data['text-106'], $post_id);
			}
			if (isset($posted_data['your-message'])) {
				update_post_meta($post_id, 'your-message', $posted_data['your-message']);
			}
			if (isset($posted_data['rate'])) {
				update_field('rating_points', $posted_data['rate'], $post_id);
			}
		}
		return $posted_data;
	}
	return $posted_data;
}

add_filter('wpcf7_posted_data', 'save_posted_data');

/**
 * Project Gallery
 */
function filter_projectgallery()
{
	ob_start();
	$pcategory  = isset($_POST['pcategory']) ? $_POST['pcategory'] : '';
	$pgpage     = $_POST['pgpage'];
	$query_args = array(
		'post_type'      => 'projectgallery',
		'post_status'    => 'publish',
		'posts_per_page' => 6,
		'paged'          => $pgpage,
	);
	if (! empty($pcategory)) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'projectgallery-cat',
				'field'    => 'term_id',
				'terms'    => $pcategory,
			)
		);
	}

	$query = new WP_Query($query_args);

	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post();
			$post_id    = get_the_ID();
			$post_title = get_the_title($post_id);
			$permalink  = get_permalink($post_id);
			$post_image = get_the_post_thumbnail_url($post_id);
			$content    = get_the_content($post_id);

			$gallery_images_urls = array();

			if (have_rows('gallery_images', $post_id)) :
				while (have_rows('gallery_images', $post_id)) : the_row();
					$gallery_image = get_sub_field('image');
					$image_caption = get_sub_field('caption');

					if ($gallery_image['url'] !== $post_image) {
						$gallery_images_urls[] = $gallery_image['url'];
					}
				endwhile;
			endif;
		?>

			<a href="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>" class="project-box" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html($post_title); ?>">
				<picture>
					<img src="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>" height="330" width="400">
				</picture>
				<span><?php echo esc_html($post_title); ?></span>
			</a>
			<?php

			foreach ($gallery_images_urls as $image_url) :
				if ($image_url) :
			?>
					<a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html($post_title); ?>" data-thumb="<?php echo esc_url($image_url); ?>" class="hidden"></a>
			<?php
				endif;
			endforeach;
		endwhile;
	else :
		echo ' <a href="javascript:void(0)" alt="Some of Our Places" class="project-box" >
                  <picture></picture>
                  <span>No posts found for this category.</span>
               </a>';
	endif;

	$total_posts = $query->found_posts;
	$posts_per_page = 6;
	$has_more_posts = ($total_posts > ($pgpage * $posts_per_page));

	wp_send_json(
		array(
			'content'        => ob_get_clean(),
			'has_more_posts' => $has_more_posts,
		)
	);
}
add_action('wp_ajax_filter_projectgallery', 'filter_projectgallery');
add_action('wp_ajax_nopriv_filter_projectgallery', 'filter_projectgallery');

add_action('save_post', 'require_featured_image_before_publishing', 10, 2);

/**
 * Require featured image before publishing
 *
 * @param array $post_id post id.
 * @param array $post post.
 */
function require_featured_image_before_publishing($post_id, $post)
{

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (! current_user_can('edit_post', $post_id)) return;
	if ($post->post_type != 'projectgallery') return;

	if (! has_post_thumbnail($post_id)) {

		remove_action('save_post', 'require_featured_image_before_publishing');

		wp_update_post(
			array(
				'ID'          => $post_id,
				'post_status' => 'draft',
			)
		);

		add_action('save_post', 'require_featured_image_before_publishing', 10, 2);

		add_filter(
			'redirect_post_location',
			function ($location) {
				return add_query_arg('message', '99', $location);
			}
		);

		add_action(
			'admin_notices',
			function () {
				echo '<div class="error"><p>Please add a featured image before publishing the post.</p></div>';
			}
		);
	}
}

/**
 * Project Gallery Filter
 */
function filter_projectcat()
{
	ob_start();
	$category_slug = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
	$is_all = $category_slug === '';

	$args = array(
		'post_type'      => 'projectgallery',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
	);
	if (! $is_all) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'projectgallery-cat',
				'field'    => 'term_id',
				'terms'    => $category_slug,
			),
		);
	}
	$query = new WP_Query($args);

	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$post_id    = get_the_ID();
			$post_title = get_the_title($post_id);
			$permalink  = get_permalink($post_id);
			$post_image = get_the_post_thumbnail_url($post_id);
			$content    = get_the_content($post_id);

			$gallery_images_urls = array();

			if (have_rows('gallery_images', $post_id)) :
				while (have_rows('gallery_images', $post_id)) : the_row();
					$gallery_image = get_sub_field('image');
					$image_caption = get_sub_field('caption');

					if ($gallery_image['url'] !== $post_image) {
						$gallery_images_urls[] = $gallery_image['url'];
					}
				endwhile;
			endif;
			?>

			<a href="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>" class="project-box" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html($post_title); ?>">
				<picture>
					<img src="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>" height="330" width="400">
				</picture>
				<span><?php echo esc_html($post_title); ?></span>
			</a>
			<?php

			foreach ($gallery_images_urls as $image_url) :
				if ($image_url) :
			?>
					<a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery-<?php echo $post_id; ?>" data-caption="<?php echo esc_html($post_title); ?>" data-thumb="<?php echo esc_url($image_url); ?>" class="hidden"></a>
		<?php
				endif;
			endforeach;
		endwhile;
		?>

<?php
	else :

		echo '<p>No posts found for this category.</p>';
	endif;
	// wp_reset_postdata();
	$has_more_posts = ($query->max_num_pages > $pgpaged);

	wp_send_json_success(array(
		'content'        => ob_get_clean(),
		'has_more_posts' => $has_more_posts,
	));
}
add_action('wp_ajax_filter_projectcat', 'filter_projectcat');
add_action('wp_ajax_nopriv_filter_projectcat', 'filter_projectcat');


// walker

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    // Starts the element output for each menu item.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Get the attributes of the menu item
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        // Check if the menu item has children
        $has_children = in_array('menu-item-has-children', $classes);

        // Add the list item
        $output .= '<li id="menu-item-'. $item->ID . '" class="' . esc_attr($class_names) . '">';

        // Start the link
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link' . ($has_children ? ' has-children' : '') . '"';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // Add the span tag only if the menu item has children
        if ($has_children) {
            $item_output .= ' <span class="menu-arrow"></span>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// $to = "trupti.kanzariya@cmarix.com";

// $subject = 'wp_mail function test';
// $message = 'This is a test of the wp_mail function: wp_mail is working';
// $headers = '';

// $sent_message = wp_mail($to, $subject, $message, $headers);

// if ($sent_message) {

// 	echo 'The test message was sent. Check your email inbox.';
// } else {

// 	echo 'The message was not sent!';
// }

add_filter('nav_menu_css_class', 'remove_current_menu_item_class', 10, 2);

function remove_current_menu_item_class($classes, $item) {
    // Check if it's a custom link
    if ('custom' === $item->type) {
        // Remove 'current-menu-item' class if it exists
        $classes = array_diff($classes, ['current-menu-item']);
    }
    return $classes;
}


// function cf7_post_names_dropdown() {
//     $posts = get_posts(array(
//         'numberposts' => -1,
//         'post_type'   => 'projectgallery',
//         'post_status' => 'publish'
//     ));

//     $options = '<option value="">Select a post</option>'; // Default option
//     foreach ($posts as $post) {
//         $options .= sprintf('<option value="%s">%s</option>', esc_attr($post->ID), esc_html($post->post_title));
//     }

//     return $options;
// }
// add_shortcode('post_names_dropdown', 'cf7_post_names_dropdown');
// function cf7_post_names_dropdown($tag) {
//     // Check if it's the specific select field in the form
//     if ($tag['name'] != 'cf7-post-dropdown') {
//         return $tag;
//     }

//     // Retrieve posts from the desired post type
//     $posts = get_posts(array(
//         'numberposts' => -1,
//         'post_type'   => 'projectgallery', // Adjust this to your post type
//         'post_status' => 'publish'
//     ));

//     // Reset the raw values and labels
//     $tag['raw_values'] = array();
//     $tag['labels'] = array();

//     // Populate the dropdown with post titles only
//     foreach ($posts as $post) {
//         $tag['raw_values'][] = $post->post_title; // Set title as value
//         $tag['labels'][] = $post->post_title; // Set title as label
//     }

//     // Set up pipes so only titles are passed to the email
//     $pipes = new WPCF7_Pipes($tag['raw_values']);
//     $tag['values'] = $pipes->collect_befores();
//     $tag['pipes'] = $pipes;

//     return $tag;
// }

// // Add the filter to modify the form tag
// add_filter('wpcf7_form_tag', 'cf7_post_names_dropdown', 10, 1);

// function cf7_custom_mail_sent($contact_form) {
//     // Get the submission data
//     $submission = WPCF7_Submission::get_instance();

//     if ($submission) {
//         // Retrieve the posted form data
//         $data = $submission->get_posted_data();

//         // Log the posted data to see if we're getting the correct ID
//         error_log('Form submission data: ' . print_r($data, true));

//         // Check if the 'cf7-post-dropdown' field exists
//         if (isset($data['cf7-post-dropdown']) && is_array($data['cf7-post-dropdown'])) {
//             // Get the selected post ID (array[0] for single selection)
//             $post_id = $data['cf7-post-dropdown'][0];

//             // Log the selected post ID to make sure we're getting the correct one
//             error_log('Selected Post ID: ' . $post_id);

//             // Fetch the post title using the post ID
//             $post_title = get_the_title($post_id);

//             // Log the post title to confirm we're getting the title
//             if ($post_title) {
//                 error_log('Fetched Post Title: ' . $post_title);
//             } else {
//                 error_log('Error: Post title not found for ID: ' . $post_id);
//             }

//             // Check if the post title was found
//             if ($post_title) {
//                 // Get the current email body
//                 $mail = $contact_form->prop('mail');

//                 // Log the original email body
//                 error_log('Original Email Body: ' . print_r($mail, true));

//                 // If email is HTML, use <br> for line breaks (for HTML formatted emails)
//                 if (strpos($mail['body'], '<html') !== false) {
//                     $mail['body'] .= "<br><br>Selected Project: " . $post_title;
//                 } else {
//                     // For plain text emails, use \n for line breaks
//                     $mail['body'] .= "\n\nSelected Project: " . $post_title;
//                 }

//                 // Log the modified email body
//                 error_log('Modified Email Body: ' . print_r($mail, true));

//                 // Update the email properties with the modified body
//                 $contact_form->set_properties(array('mail' => $mail));

//                 // Final verification
//                 error_log('Email body successfully updated.');
//             } else {
//                 error_log('Error: Post title could not be found for ID: ' . $post_id);
//             }
//         } else {
//             error_log('Error: cf7-post-dropdown field not set or invalid.');
//         }
//     } else {
//         error_log('Error: No submission instance found.');
//     }
// }

// add_action('wpcf7_mail_sent', 'cf7_custom_mail_sent');







function add_alt_tag_to_airbnb_slider($content) {
    $alt_text = 'Default alt text for images'; // Set your desired alt text here
    
    // Add alt text to images if they don't have one
    $content = str_replace('<img ', '<img alt="' . esc_attr($alt_text) . '" ', $content);
    
    return $content;
}


add_filter('airbnb_slider_output', 'add_alt_tag_to_airbnb_slider');
// Add to cart action hooks
add_action('wp_ajax_woocommerce_add_to_cart', 'woocommerce_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'woocommerce_add_to_cart');

function woocommerce_add_to_cart() {
   
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $variation_id = isset($_POST['variation_id']) ? absint($_POST['variation_id']) : 0;
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 1;
    $attributes = isset($_POST['attributes']) ? $_POST['attributes'] : [];

    // Check if product ID is valid
    if ($product_id) {
    
        if ($variation_id > 0) {
            $added = WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $attributes);
        } else {
            
            $added = WC()->cart->add_to_cart($product_id, $quantity);
        }

        if ($added) {
            wp_send_json_success(['message' => 'Product added to cart']);
        } else {
            wp_send_json_error(['message' => 'Failed to add product to cart']);
        }
    } else {
        wp_send_json_error(['message' => 'Invalid product ID']);
    }

    wp_die();
}


// Variation ID fetching hooks
add_action('wp_ajax_get_variation_id', 'ajax_get_variation_id');
add_action('wp_ajax_nopriv_get_variation_id', 'ajax_get_variation_id');

function ajax_get_variation_id() {
    $product_id = intval($_POST['product_id']);
    $attributes = isset($_POST['attributes']) ? $_POST['attributes'] : [];

    $product = wc_get_product($product_id);

    if ($product && $product->is_type('variable')) {
        // Find the variation ID based on attributes
        $variation_id = $product->get_matching_variation($attributes);

        if ($variation_id) {
            $variation = new WC_Product_Variation($variation_id);
            $response = array(
                'variation_id' => $variation_id,
                'price' => $variation->get_price_html(),
            );
            wp_send_json_success($response);
        } else {
            wp_send_json_error(array('message' => 'No matching variation found'));
        }
    } else {
        wp_send_json_error(array('message' => 'Invalid product or non-variable product'));
    }

    wp_die();
}
function refresh_mini_cart() {
    ob_start();
    woocommerce_mini_cart();
    $mini_cart = ob_get_clean();


    wp_send_json_success(array(
        'mini_cart' => $mini_cart,
        'cart_count' => WC()->cart->get_cart_contents_count(),
        'cart_total' => WC()->cart->get_cart_total()
    ));
}
add_action('wp_ajax_refresh_mini_cart', 'refresh_mini_cart');
add_action('wp_ajax_nopriv_refresh_mini_cart', 'refresh_mini_cart');


function calendar_js(){
    ?>
    <script>
    jQuery(function($){
            var start = $('.date-start input').first();
            var end = $('.date-end input').first();

            start.on('change', function() {
                    var start_date = $(this).datepicker('getDate');
                    start_date.setDate(start_date.getDate() + 3);
                    end.datepicker('option', 'minDate', start_date);
            });
    });
    </script>
    <?php
    }
    add_action('wp_footer', 'calendar_js');

function custom_footer_script() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            var $startDate = $('#start-date');
            var $endDate = $('#end-date');

            $startDate.on('change', function() {
                var startDateValue = $(this).val();
                if (startDateValue) {
                    $endDate.attr('min', startDateValue);
                    
                    if ($endDate.val() && $endDate.val() < startDateValue) {
                        $endDate.val('');
                    }
                }
            });

            $endDate.on('change', function() {
                var endDateValue = $(this).val();
                if (endDateValue) {
                    $startDate.attr('max', endDateValue);
                }
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_footer_script');
