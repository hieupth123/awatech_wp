<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package awatech
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function awatech_body_classes( $classes ) {
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
add_filter( 'body_class', 'awatech_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function awatech_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'awatech_pingback_header' );


// Register Custom Post Type
function duan_post_type() {

	$labels = array(
		'name'                  => _x( 'Dự án', 'Post Type General Name', 'bbase-code' ),
		'singular_name'         => _x( 'Dự án', 'Post Type Singular Name', 'bbase-code' ),
		'menu_name'             => __( 'Dự án', 'bbase-code' ),
		'name_admin_bar'        => __( 'Dự án', 'bbase-code' ),
		'archives'              => __( 'Item Archives', 'bbase-code' ),
		'attributes'            => __( 'Item Attributes', 'bbase-code' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bbase-code' ),
		'all_items'             => __( 'All Items', 'bbase-code' ),
		'add_new_item'          => __( 'Add New Item', 'bbase-code' ),
		'add_new'               => __( 'Add New', 'bbase-code' ),
		'new_item'              => __( 'New Item', 'bbase-code' ),
		'edit_item'             => __( 'Edit Item', 'bbase-code' ),
		'update_item'           => __( 'Update Item', 'bbase-code' ),
		'view_item'             => __( 'View Item', 'bbase-code' ),
		'view_items'            => __( 'View Items', 'bbase-code' ),
		'search_items'          => __( 'Search Item', 'bbase-code' ),
		'not_found'             => __( 'Not found', 'bbase-code' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bbase-code' ),
		'featured_image'        => __( 'Featured Image', 'bbase-code' ),
		'set_featured_image'    => __( 'Set featured image', 'bbase-code' ),
		'remove_featured_image' => __( 'Remove featured image', 'bbase-code' ),
		'use_featured_image'    => __( 'Use as featured image', 'bbase-code' ),
		'insert_into_item'      => __( 'Insert into item', 'bbase-code' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bbase-code' ),
		'items_list'            => __( 'Items list', 'bbase-code' ),
		'items_list_navigation' => __( 'Items list navigation', 'bbase-code' ),
		'filter_items_list'     => __( 'Filter items list', 'bbase-code' ),
	);
	$args = array(
		'label'                 => __( 'Dự án', 'bbase-code' ),
		'description'           => __( 'Post Type Description', 'bbase-code' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'duan', $args );

}
add_action( 'init', 'duan_post_type', 0 );


// Register Custom Taxonomy
function duan_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Dự án', 'Taxonomy General Name', 'bbase-code' ),
		'singular_name'              => _x( 'Dự án', 'Taxonomy Singular Name', 'bbase-code' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'bbase-code' ),
		'parent_item'                => __( 'Parent Item', 'bbase-code' ),
		'parent_item_colon'          => __( 'Parent Item:', 'bbase-code' ),
		'new_item_name'              => __( 'New Item Name', 'bbase-code' ),
		'add_new_item'               => __( 'Add New Item', 'bbase-code' ),
		'edit_item'                  => __( 'Edit Item', 'bbase-code' ),
		'update_item'                => __( 'Update Item', 'bbase-code' ),
		'view_item'                  => __( 'View Item', 'bbase-code' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bbase-code' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bbase-code' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bbase-code' ),
		'popular_items'              => __( 'Popular Items', 'bbase-code' ),
		'search_items'               => __( 'Search Items', 'bbase-code' ),
		'not_found'                  => __( 'Not Found', 'bbase-code' ),
		'no_terms'                   => __( 'No items', 'bbase-code' ),
		'items_list'                 => __( 'Items list', 'bbase-code' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bbase-code' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy_duan', array( 'duan' ), $args );

}
add_action( 'init', 'duan_taxonomy', 0 );


// Register Custom Post Type
function dichvu_post_type() {

	$labels = array(
		'name'                  => _x( 'Dịch vụ', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Dịch vụ', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Dịch Vụ Môi Trường', 'text_domain' ),
		'name_admin_bar'        => __( 'Dịch Vụ Môi Trường', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Dịch vụ', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dichvu', $args );

}
add_action( 'init', 'dichvu_post_type', 0 );

// Register Custom Taxonomy
function dichvu_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Dịch vụ', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Dịch vụ', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy_dichvu', array( 'dichvu' ), $args );

}
add_action( 'init', 'dichvu_taxonomy', 0 );


// Register Custom Post Type
function sanpham_post_type() {

	$labels = array(
		'name'                  => _x( 'Sản phẩm', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Sản phẩm', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Sản phẩm', 'text_domain' ),
		'name_admin_bar'        => __( 'Sản phẩm', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Sản phẩm', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sanpham', $args );

}
add_action( 'init', 'sanpham_post_type', 0 );

// Register Custom Taxonomy
function sanpham_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Sản phẩm', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Sản phẩm', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy_sanpham', array( 'sanpham' ), $args );

}
add_action( 'init', 'sanpham_taxonomy', 0 );


// Register Custom Post Type
function gioithieu_post_type() {

	$labels = array(
		'name'                  => _x( 'Giới thiệu', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Giói thiệu', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Giới thiệu', 'text_domain' ),
		'name_admin_bar'        => __( 'Giới thiệu', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Gioi thieu', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'gioithieu_post_type', $args );

}
add_action( 'init', 'gioithieu_post_type', 0 );