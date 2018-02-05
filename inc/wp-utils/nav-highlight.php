<?php

/************************************
  Highlight Nav archive when visiting
  child page from Custom Post Type
*************************************/

function custom_active_item_classes($classes = array(), $menu_item = false) {
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){
	    $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );
