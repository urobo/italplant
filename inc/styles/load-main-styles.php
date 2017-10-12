<?php

/************************************
 Styles
*************************************/

function register_styles() {
    wp_enqueue_style( 'italplant-stylesheet', get_stylesheet_uri()  );

    // Google Fonts
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');

}
add_action('wp_enqueue_scripts', 'register_styles');
