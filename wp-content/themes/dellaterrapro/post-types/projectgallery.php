<?php

/**
 * Registers the `projectgallery` post type.
 */
function projectgallery_init() {
	register_post_type(
		'projectgallery',
		array(
			'labels'                => array(
				'name'                  => __( 'ProjectGalleries', 'dellaterrapro' ),
				'singular_name'         => __( 'ProjectGallery', 'dellaterrapro' ),
				'all_items'             => __( 'All ProjectGalleries', 'dellaterrapro' ),
				'archives'              => __( 'ProjectGallery Archives', 'dellaterrapro' ),
				'attributes'            => __( 'ProjectGallery Attributes', 'dellaterrapro' ),
				'insert_into_item'      => __( 'Insert into ProjectGallery', 'dellaterrapro' ),
				'uploaded_to_this_item' => __( 'Uploaded to this ProjectGallery', 'dellaterrapro' ),
				'featured_image'        => _x( 'Featured Image', 'projectgallery', 'dellaterrapro' ),
				'set_featured_image'    => _x( 'Set featured image', 'projectgallery', 'dellaterrapro' ),
				'remove_featured_image' => _x( 'Remove featured image', 'projectgallery', 'dellaterrapro' ),
				'use_featured_image'    => _x( 'Use as featured image', 'projectgallery', 'dellaterrapro' ),
				'filter_items_list'     => __( 'Filter ProjectGalleries list', 'dellaterrapro' ),
				'items_list_navigation' => __( 'ProjectGalleries list navigation', 'dellaterrapro' ),
				'items_list'            => __( 'ProjectGalleries list', 'dellaterrapro' ),
				'new_item'              => __( 'New ProjectGallery', 'dellaterrapro' ),
				'add_new'               => __( 'Add New', 'dellaterrapro' ),
				'add_new_item'          => __( 'Add New ProjectGallery', 'dellaterrapro' ),
				'edit_item'             => __( 'Edit ProjectGallery', 'dellaterrapro' ),
				'view_item'             => __( 'View ProjectGallery', 'dellaterrapro' ),
				'view_items'            => __( 'View ProjectGalleries', 'dellaterrapro' ),
				'search_items'          => __( 'Search ProjectGalleries', 'dellaterrapro' ),
				'not_found'             => __( 'No ProjectGalleries found', 'dellaterrapro' ),
				'not_found_in_trash'    => __( 'No ProjectGalleries found in trash', 'dellaterrapro' ),
				'parent_item_colon'     => __( 'Parent ProjectGallery:', 'dellaterrapro' ),
				'menu_name'             => __( 'ProjectGalleries', 'dellaterrapro' ),
			),
			'public'                => false,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'comments' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-format-gallery',
			'show_in_rest'          => true,
			'rest_base'             => 'projectgallery',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);
}

add_action( 'init', 'projectgallery_init' );


/**
 * Registers the `projectgallery_cat` taxonomy,
 * for use with 'projectgallery'.
 */
function projectgallery_cat_init() {
	register_taxonomy( 'projectgallery-cat', [ 'projectgallery' ], array(
		'hierarchical'          => false,
		'public'                => false,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'query_var'             => true,
		'rewrite'               => true,
		'capabilities'          => array(
			'manage_terms' => 'edit_posts',
			'edit_terms'   => 'edit_posts',
			'delete_terms' => 'edit_posts',
			'assign_terms' => 'edit_posts',
		),
		'labels'                => array(
			'name'                       => __( 'Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Gallery Categorie', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent Gallery Categorie:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'view_item'                  => __( 'View Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'Add New Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New Gallery Categorie', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate Gallery Categories with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No Gallery Categories found.', 'YOUR-TEXTDOMAIN' ),
			'no_terms'                   => __( 'No Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Gallery Categories', 'YOUR-TEXTDOMAIN' ),
			'items_list_navigation'      => __( 'Gallery Categories list navigation', 'YOUR-TEXTDOMAIN' ),
			'items_list'                 => __( 'Gallery Categories list', 'YOUR-TEXTDOMAIN' ),
			'most_used'                  => _x( 'Most Used', 'projectgallery-cat', 'YOUR-TEXTDOMAIN' ),
			'back_to_items'              => __( '&larr; Back to Gallery Categories', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'          => true,
		'rest_base'             => 'projectgallery-cat',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}

add_action( 'init', 'projectgallery_cat_init' );

/**
 * Sets the post updated messages for the `projectgallery_cat` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `projectgallery_cat` taxonomy.
 */
function projectgallery_cat_updated_messages( $messages ) {

	$messages['projectgallery-cat'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Gallery Categorie added.', 'YOUR-TEXTDOMAIN' ),
		2 => __( 'Gallery Categorie deleted.', 'YOUR-TEXTDOMAIN' ),
		3 => __( 'Gallery Categorie updated.', 'YOUR-TEXTDOMAIN' ),
		4 => __( 'Gallery Categorie not added.', 'YOUR-TEXTDOMAIN' ),
		5 => __( 'Gallery Categorie not updated.', 'YOUR-TEXTDOMAIN' ),
		6 => __( 'Gallery Categorie deleted.', 'YOUR-TEXTDOMAIN' ),
	);

	return $messages;
}

add_filter( 'term_updated_messages', 'projectgallery_cat_updated_messages' );


/**
 * Sets the post updated messages for the `projectgallery` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `projectgallery` post type.
 */
function projectgallery_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['projectgallery'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'ProjectGallery updated. <a target="_blank" href="%s">View ProjectGallery</a>', 'dellaterrapro' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'dellaterrapro' ),
		3  => __( 'Custom field deleted.', 'dellaterrapro' ),
		4  => __( 'ProjectGallery updated.', 'dellaterrapro' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'ProjectGallery restored to revision from %s', 'dellaterrapro' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'ProjectGallery published. <a href="%s">View ProjectGallery</a>', 'dellaterrapro' ), esc_url( $permalink ) ),
		7  => __( 'ProjectGallery saved.', 'dellaterrapro' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'ProjectGallery submitted. <a target="_blank" href="%s">Preview ProjectGallery</a>', 'dellaterrapro' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'ProjectGallery scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview ProjectGallery</a>', 'dellaterrapro' ), date_i18n( __( 'M j, Y @ G:i', 'dellaterrapro' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'ProjectGallery draft updated. <a target="_blank" href="%s">Preview ProjectGallery</a>', 'dellaterrapro' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'projectgallery_updated_messages' );

/**
 * Sets the bulk post updated messages for the `projectgallery` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `projectgallery` post type.
 */
function projectgallery_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['projectgallery'] = array(
		/* translators: %s: Number of ProjectGalleries. */
		'updated'   => _n( '%s ProjectGallery updated.', '%s ProjectGalleries updated.', $bulk_counts['updated'], 'dellaterrapro' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 ProjectGallery not updated, somebody is editing it.', 'dellaterrapro' ) :
		/* translators: %s: Number of ProjectGalleries. */
		_n( '%s ProjectGallery not updated, somebody is editing it.', '%s ProjectGalleries not updated, somebody is editing them.', $bulk_counts['locked'], 'dellaterrapro' ),
		/* translators: %s: Number of ProjectGalleries. */
		'deleted'   => _n( '%s ProjectGallery permanently deleted.', '%s ProjectGalleries permanently deleted.', $bulk_counts['deleted'], 'dellaterrapro' ),
		/* translators: %s: Number of ProjectGalleries. */
		'trashed'   => _n( '%s ProjectGallery moved to the Trash.', '%s ProjectGalleries moved to the Trash.', $bulk_counts['trashed'], 'dellaterrapro' ),
		/* translators: %s: Number of ProjectGalleries. */
		'untrashed' => _n( '%s ProjectGallery restored from the Trash.', '%s ProjectGalleries restored from the Trash.', $bulk_counts['untrashed'], 'dellaterrapro' ),
	);

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'projectgallery_bulk_updated_messages', 10, 2 );
