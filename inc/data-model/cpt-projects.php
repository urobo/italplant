<?php
/************************************
Costom Post Type for Projects
*************************************/

function cpt_projects_italplant() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'italplant' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'italplant' ),
		'menu_name'             => __( 'Projects', 'italplant' ),
		'name_admin_bar'        => __( 'Project', 'italplant' ),
		'archives'              => __( 'Projects', 'italplant' ),
		'parent_item_colon'     => __( 'Parent Project:', 'italplant' ),
		'all_items'             => __( 'All Projects', 'italplant' ),
		'add_new_item'          => __( 'Add New Project', 'italplant' ),
		'add_new'               => __( 'Add Project', 'italplant' ),
		'new_item'              => __( 'New Project', 'italplant' ),
		'edit_item'             => __( 'Edit Project', 'italplant' ),
		'update_item'           => __( 'Update Project', 'italplant' ),
		'view_item'             => __( 'View Project', 'italplant' ),
		'search_items'          => __( 'Search Project', 'italplant' ),
		'not_found'             => __( 'Project Not found', 'italplant' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'italplant' ),
		'featured_image'        => __( 'Featured Image', 'italplant' ),
		'set_featured_image'    => __( 'Set featured image', 'italplant' ),
		'remove_featured_image' => __( 'Remove featured image', 'italplant' ),
		'use_featured_image'    => __( 'Use as featured image', 'italplant' ),
		'insert_into_item'      => __( 'Insert into Project', 'italplant' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'italplant' ),
		'items_list'            => __( 'Projects list', 'italplant' ),
		'items_list_navigation' => __( 'Projects list navigation', 'italplant' ),
		'filter_items_list'     => __( 'Filter Projects list', 'italplant' ),
	);

	$args = array(
		'label'                 => __( 'Project', 'italplant' ),
		'description'           => __( 'All Projects', 'italplant' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-pressthis',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
    'rewrite'               => array( 'slug' => 'Projects', 'with_front' => false ),
		'capability_type'       => 'page',
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'cpt_projects_italplant', 0 );
