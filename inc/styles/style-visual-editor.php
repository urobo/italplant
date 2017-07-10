<?php

/************************************
 Theme's style for visual editor.
*************************************/

function theme_add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'theme_add_editor_styles' );
