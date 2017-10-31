<?php
/************************************
Costom Post Type for Areas
*************************************/

function cpt_areas_italplant() {

	$labels = array(
		'name'                  => _x( 'Areas', 'Post Type General Name', 'italplant' ),
		'singular_name'         => _x( 'Area', 'Post Type Singular Name', 'italplant' ),
		'menu_name'             => __( 'Areas', 'italplant' ),
		'name_admin_bar'        => __( 'Area', 'italplant' ),
		'archives'              => __( 'Areas', 'italplant' ),
		'parent_item_colon'     => __( 'Parent Area:', 'italplant' ),
		'all_items'             => __( 'All Areas', 'italplant' ),
		'add_new_item'          => __( 'Add New Area', 'italplant' ),
		'add_new'               => __( 'Add Area', 'italplant' ),
		'new_item'              => __( 'New Area', 'italplant' ),
		'edit_item'             => __( 'Edit Area', 'italplant' ),
		'update_item'           => __( 'Update Area', 'italplant' ),
		'view_item'             => __( 'View Area', 'italplant' ),
		'search_items'          => __( 'Search Area', 'italplant' ),
		'not_found'             => __( 'Area Not found', 'italplant' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'italplant' ),
		'featured_image'        => __( 'Featured Image', 'italplant' ),
		'set_featured_image'    => __( 'Set featured image', 'italplant' ),
		'remove_featured_image' => __( 'Remove featured image', 'italplant' ),
		'use_featured_image'    => __( 'Use as featured image', 'italplant' ),
		'insert_into_item'      => __( 'Insert into Area', 'italplant' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Area', 'italplant' ),
		'items_list'            => __( 'Areas list', 'italplant' ),
		'items_list_navigation' => __( 'Areas list navigation', 'italplant' ),
		'filter_items_list'     => __( 'Filter Areas list', 'italplant' ),
	);

	$args = array(
		'label'                 => __( 'Area', 'italplant' ),
		'description'           => __( 'All Areas', 'italplant' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
    'rewrite'               => array( 'slug' => 'Areas', 'with_front' => false ),
		'capability_type'       => 'page',
	);
	register_post_type( 'areas', $args );

}
add_action( 'init', 'cpt_areas_italplant', 0 );
