<?php

/************************************
 Sidebar
*************************************/

function theme_sidebars() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => __( 'Main sidebar', 'italplant' ),
		'description' => __( 'The main sidebar', 'italplant' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>'
	));
}
add_action( 'widgets_init', 'theme_sidebars' );
