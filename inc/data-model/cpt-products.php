<?php
/************************************
Costom Post Type for Products
*************************************/

function cpt_italplant() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'italplant' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'italplant' ),
		'menu_name'             => __( 'Products', 'italplant' ),
		'name_admin_bar'        => __( 'Product', 'italplant' ),
		'archives'              => __( 'Products', 'italplant' ),
		'parent_item_colon'     => __( 'Parent Product:', 'italplant' ),
		'all_items'             => __( 'All Products', 'italplant' ),
		'add_new_item'          => __( 'Add New Product', 'italplant' ),
		'add_new'               => __( 'Add Product', 'italplant' ),
		'new_item'              => __( 'New Product', 'italplant' ),
		'edit_item'             => __( 'Edit Product', 'italplant' ),
		'update_item'           => __( 'Update Product', 'italplant' ),
		'view_item'             => __( 'View Product', 'italplant' ),
		'search_items'          => __( 'Search Product', 'italplant' ),
		'not_found'             => __( 'Product Not found', 'italplant' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'italplant' ),
		'featured_image'        => __( 'Featured Image', 'italplant' ),
		'set_featured_image'    => __( 'Set featured image', 'italplant' ),
		'remove_featured_image' => __( 'Remove featured image', 'italplant' ),
		'use_featured_image'    => __( 'Use as featured image', 'italplant' ),
		'insert_into_item'      => __( 'Insert into Product', 'italplant' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'italplant' ),
		'items_list'            => __( 'Products list', 'italplant' ),
		'items_list_navigation' => __( 'Products list navigation', 'italplant' ),
		'filter_items_list'     => __( 'Filter Products list', 'italplant' ),
	);

	$args = array(
		'label'                 => __( 'Product', 'italplant' ),
		'description'           => __( 'All Products', 'italplant' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
    'rewrite'               => array( 'slug' => 'Products', 'with_front' => false ),
		'capability_type'       => 'page',
	);
	register_post_type( 'Products', $args );

}
add_action( 'init', 'cpt_italplant', 0 );
