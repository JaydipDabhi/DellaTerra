<?php

/**
 * Registers the `reviews` post type.
 */
function dellaterrapro_reviews_init() {
	register_post_type(
		'reviews',
		array(
			'labels'                => array(
				'name'                  => __( 'Reviews', 'dellaterrapro' ),
				'singular_name'         => __( 'Reviews', 'dellaterrapro' ),
				'all_items'             => __( 'All Reviews', 'dellaterrapro' ),
				'archives'              => __( 'Reviews Archives', 'dellaterrapro' ),
				'attributes'            => __( 'Reviews Attributes', 'dellaterrapro' ),
				'insert_into_item'      => __( 'Insert into Reviews', 'dellaterrapro' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Reviews', 'dellaterrapro' ),
				'featured_image'        => _x( 'Featured Image', 'reviews', 'dellaterrapro' ),
				'set_featured_image'    => _x( 'Set featured image', 'reviews', 'dellaterrapro' ),
				'remove_featured_image' => _x( 'Remove featured image', 'reviews', 'dellaterrapro' ),
				'use_featured_image'    => _x( 'Use as featured image', 'reviews', 'dellaterrapro' ),
				'filter_items_list'     => __( 'Filter Reviews list', 'dellaterrapro' ),
				'items_list_navigation' => __( 'Reviews list navigation', 'dellaterrapro' ),
				'items_list'            => __( 'Reviews list', 'dellaterrapro' ),
				'new_item'              => __( 'New Reviews', 'dellaterrapro' ),
				'add_new'               => __( 'Add New', 'dellaterrapro' ),
				'add_new_item'          => __( 'Add New Reviews', 'dellaterrapro' ),
				'edit_item'             => __( 'Edit Reviews', 'dellaterrapro' ),
				'view_item'             => __( 'View Reviews', 'dellaterrapro' ),
				'view_items'            => __( 'View Reviews', 'dellaterrapro' ),
				'search_items'          => __( 'Search Reviews', 'dellaterrapro' ),
				'not_found'             => __( 'No Reviews found', 'dellaterrapro' ),
				'not_found_in_trash'    => __( 'No Reviews found in trash', 'dellaterrapro' ),
				'parent_item_colon'     => __( 'Parent Reviews:', 'dellaterrapro' ),
				'menu_name'             => __( 'Reviews', 'dellaterrapro' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'comments' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-star-filled',
			'show_in_rest'          => true,
			'rest_base'             => 'reviews',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);
}

add_action( 'init', 'dellaterrapro_reviews_init' );

/**
 * Sets the post updated messages for the `reviews` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `reviews` post type.
 */
function reviews_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['reviews'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Reviews updated. <a target="_blank" href="%s">View Reviews</a>', 'dellaterrapro' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'dellaterrapro' ),
		3  => __( 'Custom field deleted.', 'dellaterrapro' ),
		4  => __( 'Reviews updated.', 'dellaterrapro' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Reviews restored to revision from %s', 'dellaterrapro' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Reviews published. <a href="%s">View Reviews</a>', 'dellaterrapro' ), esc_url( $permalink ) ),
		7  => __( 'Reviews saved.', 'dellaterrapro' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Reviews submitted. <a target="_blank" href="%s">Preview Reviews</a>', 'dellaterrapro' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Reviews scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Reviews</a>', 'dellaterrapro' ), date_i18n( __( 'M j, Y @ G:i', 'dellaterrapro' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Reviews draft updated. <a target="_blank" href="%s">Preview Reviews</a>', 'dellaterrapro' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'reviews_updated_messages' );

/**
 * Sets the bulk post updated messages for the `reviews` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `reviews` post type.
 */
function reviews_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['reviews'] = array(
		/* translators: %s: Number of Reviews. */
		'updated'   => _n( '%s Reviews updated.', '%s Reviews updated.', $bulk_counts['updated'], 'dellaterrapro' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Reviews not updated, somebody is editing it.', 'dellaterrapro' ) :
		/* translators: %s: Number of Reviews. */
		_n( '%s Reviews not updated, somebody is editing it.', '%s Reviews not updated, somebody is editing them.', $bulk_counts['locked'], 'dellaterrapro' ),
		/* translators: %s: Number of Reviews. */
		'deleted'   => _n( '%s Reviews permanently deleted.', '%s Reviews permanently deleted.', $bulk_counts['deleted'], 'dellaterrapro' ),
		/* translators: %s: Number of Reviews. */
		'trashed'   => _n( '%s Reviews moved to the Trash.', '%s Reviews moved to the Trash.', $bulk_counts['trashed'], 'dellaterrapro' ),
		/* translators: %s: Number of Reviews. */
		'untrashed' => _n( '%s Reviews restored from the Trash.', '%s Reviews restored from the Trash.', $bulk_counts['untrashed'], 'dellaterrapro' ),
	);

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'reviews_bulk_updated_messages', 10, 2 );
