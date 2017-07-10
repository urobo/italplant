<?php

/*********************
THEME INIT
*********************/
function theme_init() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links');
	add_theme_support( 'menus' );
  	add_theme_support( 'title-tag' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );
}
add_action( 'after_setup_theme', 'theme_init' );
