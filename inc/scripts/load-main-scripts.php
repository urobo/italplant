<?php

/************************************
 Scripts
*************************************/

function register_scripts() {
    if (is_admin()) return;

    /* Enqueue theme script & style */
    wp_enqueue_script( 'italplant-js', get_template_directory_uri() . '/assets/javascript/dist/scripts.js', array('jquery'),'1.0.0', true );


    /* Enqueue comment-reply script if needed */
    // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action('wp_enqueue_scripts', 'register_scripts');
