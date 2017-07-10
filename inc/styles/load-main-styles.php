<?php

/************************************
 Styles
*************************************/

function register_styles() {
    wp_enqueue_style( 'monsieurpress-stylesheet', get_stylesheet_uri()  );

    // Google Fonts
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Lato:400,600,700|Hind:500,600,700&amp;subset=latin-ext');

}
add_action('wp_enqueue_scripts', 'register_styles');
